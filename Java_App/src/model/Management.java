/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;
import org.mindrot.BCrypt;
import model.mainclass.Metalbin;
import model.mainclass.Notification;
import model.mainclass.Production;
import model.mainclass.Booking;
import model.mainclass.Payment;
import model.mainclass.Comment;
import model.mainclass.Member;
import model.mainclass.Notify;
import model.mainclass.Inventory;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.*;
import java.time.Instant;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.util.ArrayList;
import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
//import java.util.Date;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Management {

    private String ip = "localhost";
    private String db = "/erlete_db";
    //private String ip = "localhost";
    private String url = "jdbc:mariadb://";
    private Connection connect() {
        Connection con = null;

        try {
            //con = DriverManager.getConnection(url, "root", "dam1");
            con = DriverManager.getConnection(url + ip + db, "java", "dam1");
            //con = DriverManager.getConnection("jdbc:mariadb://localhost/erlete_db", "root", "");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            System.out.println("error in the db");
        }
        return con;
    }

    /**
     *
     * @param ip
     */
//    public void setIp(String ip) {
//        this.ip = ip;
//    }
    /**
     * A method which takes an ArrayList of the type object and the name of the
     * table of which to extract the information from the database
     *
     * @param dataList the ArrayList of the type object we want to fill
     * @param table a String with the name of the table to make the sql select
     * @return the arraylist filled with data from that table of the database
     */
    public ArrayList<Object> readData(ArrayList<Object> dataList, String table) {

        String sql = "SELECT * FROM " + table;

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql);  ResultSet rs = pstmt.executeQuery();) {

            while (rs.next()) {
                if (table.equals("member")) {
                    Member m = new Member(rs.getInt("member_id"), rs.getString("name"), rs.getString("surname"), rs.getString("email"), rs.getString("password"), rs.getDate("birthdate"), rs.getInt("postcode"), rs.getString("city"), rs.getString("address"), rs.getInt("phone"), rs.getBoolean("active"));
                    dataList.add(m);

                } else if (table.equals("comment")) {
                    Timestamp d = rs.getTimestamp("comment_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Comment c = new Comment(rs.getInt("comment_id"), date, rs.getString("message"), rs.getInt("member_id"));
                    dataList.add(c);
                } else if (table.equals("booking")) {

                    Booking b = new Booking(rs.getInt("booking_id"), rs.getDate("entrydate"), rs.getDate("exitdate"), rs.getInt("kilos"), rs.getInt("total"), rs.getInt("member_id"));
                    dataList.add(b);
                } else if (table.equals("payment")) {
                    Timestamp d = rs.getTimestamp("pay_date");
                    LocalDateTime data = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Payment p = new Payment(rs.getInt("payment_id"), rs.getString("description"), data, (float) rs.getInt("total"), rs.getInt("member_id"));
                    dataList.add(p);
                } else if (table.equals("metalbin")) {

                    Metalbin m = new Metalbin(rs.getInt("metalbin_id"), rs.getInt("capacity"), rs.getBoolean("available"), rs.getDate("available_date"));
                    dataList.add(m);
                    dataList.add(m);

                } else if (table.equals("production")) {
                    Timestamp d = rs.getTimestamp("production_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();

                    Production p = new Production(rs.getInt("production_id"), (float) rs.getInt("kilos"), (float) rs.getInt("total"), rs.getInt("booking_id"), rs.getInt("metalbin_id"), date);
                    dataList.add(p);

                } else if (table.equals("inventory")) {
                    Inventory in = new Inventory(rs.getInt("Item_Id"), rs.getString("model"), rs.getString("comment"));
                    dataList.add(in);
                } else if (table.equals("notification")) {
                    Notification no = new Notification(rs.getInt("notification_id"), rs.getString("message"));
                    dataList.add(no);
                } else if (table.equals("notify")) {
                    Timestamp d = rs.getTimestamp("notification_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();

                    Notify not = new Notify(rs.getInt("member_id"), rs.getInt("notification_id"), date, rs.getBoolean("seen"));
                    dataList.add(not);
                }

            }
            return dataList;

        } catch (Exception ex) {
            System.out.println("fail doing consult");
            System.out.println(ex.getMessage());
        }

        return dataList;
    }

    /**
     * A method to add a member to the database
     *
     * @param newMember takes an object of the Member class with the data of the
     * new member
     * @return a boolean to know if the insert has been successfull or not
     */
    public boolean insertMember(Member newMember) {
        boolean done = false;
        String img = "images/bee-icon.jpg";
        String usrpass = newMember.getPassword();
        String sql = "INSERT INTO member(email, name, surname, password, city, postcode, address, phone, picture, active) VALUES (?,?,?,?,?,?,?,?,?,?)";
        if (usrpass.toCharArray()[0] == '1' && usrpass.toCharArray()[1] == '2' && usrpass.toCharArray()[2] == '3') { //if the new member has only name, surname, email and password
            try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql);) {

                pstmt.setString(1, newMember.getEmail());
                pstmt.setString(2, newMember.getName());
                pstmt.setString(3, newMember.getSurname());
                pstmt.setString(4, BCrypt.hashpw(newMember.getPassword(),BCrypt.gensalt()));
                pstmt.setString(5, "");
                pstmt.setInt(6, 0);
                pstmt.setString(7, "");
                pstmt.setInt(8, 0);
                pstmt.setBoolean(10, false);
                pstmt.setString(9, img);
                pstmt.executeUpdate();

                done = true;
            } catch (SQLException e) {
                System.out.println("fail on insert");
                System.out.println(e.getMessage());

            }

        } else {
            try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql);) {

                pstmt.setString(1, newMember.getEmail());
                pstmt.setString(2, newMember.getName());
                pstmt.setString(3, newMember.getSurname());
                pstmt.setString(4, BCrypt.hashpw(newMember.getPassword(),BCrypt.gensalt()));
                pstmt.setString(5, newMember.getCity());
                pstmt.setInt(6, newMember.getPostCode());
                pstmt.setString(7, newMember.getAddress());
                pstmt.setInt(8, newMember.getPhone());
                pstmt.setBoolean(9, newMember.isActive());
                pstmt.executeUpdate();

                done = true;
            } catch (SQLException e) {
                System.out.println("fail on insert");
                System.out.println(e.getMessage());

            }

        }

        return done;
    }
    
    public boolean paymentNotify(int id){
        String sql = "INSERT INTO notify(member_id,notification_id) VALUES(?,?)";
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)){
            
            pstmt.setInt(1, id);
            pstmt.setInt(2, 5);
            pstmt.executeUpdate();
            System.out.println("notification sent");
            return true;
        }catch(Exception E){
            return false;
        }
    }

    /**
     * A method that changes the boolean active of member to know if the count
     * is available or not
     *
     * @param id it takes the id of the member whose account we want to activate
     * @return a boolean that indicates if the account has been activated
     * successfully
     */
    public boolean activateMember(int id) {
        boolean done = false;
        String sql = "UPDATE member SET active=?"
                + " WHERE member_id = ?";
        String sql2 = "INSERT INTO payment(description,total,member_id) VALUES(?,?,?)";
        String sql3 = "INSERT INTO notify(member_id,notification_id) VALUES(?,?)";
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql);  PreparedStatement pstmt2 = con.prepareStatement(sql2);PreparedStatement pstmt3 = con.prepareStatement(sql3);) {

            pstmt.setInt(1, 1);
            pstmt.setInt(2, id);
            pstmt.executeUpdate();

            pstmt2.setString(1, "Annual fee");
            pstmt2.setInt(2, -30);
            pstmt2.setInt(3, id);
            pstmt2.executeUpdate();
            
            pstmt3.setInt(1, id);
            pstmt3.setInt(2, 4);
            pstmt3.executeUpdate();

            return true;

        } catch (SQLException e) {
            System.out.println("fail activating a member");
            System.out.println(e.getMessage());

        }
        return done;
    }

    /**
     * disables the account of a member
     *
     * @param id it takes the id of the member whose account we want to disable
     * @return a boolean that indicates if the account has been disabled
     * successfully
     */
    public boolean disableMember(int id) {
        boolean done = false;
        String sql = "UPDATE member SET active=? WHERE member_id = ?";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setBoolean(1, false);
            pstmt.setInt(2, id);
            pstmt.executeUpdate();
            return true;

        } catch (SQLException e) {
            System.out.println("fail disabling a member");
            System.out.println(e.getMessage());

        }
        return done;
    }

    /**
     * it deletes a bad comment made by a member on the forum
     *
     * @param badComment it takes the id of the bad comment
     * @return a boolean that indicates if the comment has been erased
     * successfully
     */
    public boolean deleteComment(int commentId) {
        boolean done = false;
        String sql = "DELETE FROM comment WHERE comment_id = ?";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setInt(1, commentId);
            pstmt.executeUpdate();
            done = true;

        } catch (SQLException e) {
            System.out.println("Fail deleting comment");
            System.out.println(e.getMessage());
        }

        return done;
    }

    /**
     * This method Deletes selected item on the inventory table
     *
     * @param itemId it takes the id of the item you want erase
     * @return a boolean that indicates if the operation has been succesfull
     */
    public boolean deleteInventory(int itemId) {
        boolean done = false;
        String sql = "DELETE FROM inventory WHERE item_id = ?";
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setInt(1, itemId);
            pstmt.executeUpdate();
            done = true;
        } catch (SQLException e) {
            System.out.println(e);
        }
        return done;
    }

    /**
     * it attaches a notification to a members account
     *
     * @param notification the message
     * @param member_id the member we want to send the notification
     * @return a boolean that indicates if the notification has been attached
     * successfully
     */
    public boolean sendWarning(Notification notification, int member_id) {
        boolean done = false;

        String sql = "INSERT INTO notify(member_id, notification_id, seen) VALUES (?,?,?)";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setInt(1, member_id);
            pstmt.setInt(2, notification.getNotification_id());

            pstmt.setBoolean(3, false);
            //en la base de datos poner por defecto el valor del tiempo actual con el metodo now()
            pstmt.executeUpdate();
            done = true;

        } catch (SQLException e) {
            System.out.println("Error inserting notify");
            System.out.println(e.getMessage());
        }

        return done;
    }

    /**
     * it creates a new payment on the payments table
     *
     * @param transfer the payment we want to add
     * @return a boolean that indicates if the payment has been added
     * successfully
     */
    public boolean registerPayment(Payment transfer) {
        boolean done = false;
        String sql = "INSERT INTO payment(description, total, member_id) VALUES(?,?,?)";//pay_date: en la base de datos poner por defecto el valor del tiempo actual con el metodo now()
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, transfer.getDescription());
            pstmt.setInt(2, (int) transfer.getTotal());

            pstmt.setInt(3, transfer.getMember_id());
            pstmt.executeUpdate();
            done = true;

            System.out.println("Payment transfered");
        } catch (SQLException e) {
            System.out.println("Error in the transaction");
            System.out.println(e.getMessage());
        }

        return done;
    }

    /**
     * it adds a new material to the inventory
     *
     * @param material the new material we want to add to the inventory
     * @return a boolean that indicates if the material has been added
     * successfully
     */
    public boolean addInventory(Inventory material) {
        boolean done = false;

        String sql = "INSERT INTO inventory(model, comment) VALUES (?,?)";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, material.getModel());
            pstmt.setString(2, material.getComment());
            pstmt.executeUpdate();
            done = true;
        } catch (SQLException e) {
            System.out.println("Error adding item on inventory");
            System.out.println(e.getMessage());
        }

        return done;
    }

//    /**
//     * Encryption method (SHA256). Takes a String and returns it encrypted
//     *
//     * @param input
//     * @return
//     */
//    public static String encryptThisString(String input) { //mira esto mañana en kasa
//        try {
//            // getInstance() method is called with algorithm SHA-512 
//            MessageDigest md = MessageDigest.getInstance("SHA-512");
//
//            // digest() method is called 
//            // to calculate message digest of the input string 
//            // returned as array of byte 
//            byte[] messageDigest = md.digest(input.getBytes());
//
//            // Convert byte array into signum representation 
//            BigInteger no = new BigInteger(1, messageDigest);
//
//            // Convert message digest into hex value 
//            String hashtext = no.toString(16);
//
//            // Add preceding 0s to make it 32 bit 
//            while (hashtext.length() < 32) {
//                hashtext = "0" + hashtext;
//            }
//
//            // return the HashText 
//            return hashtext;
//        } // For specifying wrong message digest algorithms 
//        catch (NoSuchAlgorithmException e) {
//            throw new RuntimeException(e);
//        }
//    }
}
