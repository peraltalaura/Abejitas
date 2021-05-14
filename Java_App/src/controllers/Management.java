/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controllers;

import mainclass.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.*;
import java.time.Instant;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
//import java.util.Date;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Management {

    //private String url = "204.204.2.1:80/erlete_db";
    private String db = "/erlete_db";
    private String ip = "localhost";
    private String url = "jdbc:mariadb://";

    private Connection connect() {
        Connection con = null;

        try {
            //con = DriverManager.getConnection(url, "root", "dam1");
            //con = DriverManager.getConnection(url + ip + db, "root", "dam1");
            con = DriverManager.getConnection(url + ip + db, "root", "");
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
    public void setIp(String ip) {
        this.ip = ip;
    }

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

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql); ResultSet rs = pstmt.executeQuery();) {

            while (rs.next()) {
                if (table.equals("member")) {
                    Member m = new Member(rs.getInt("member_id"), rs.getString("name"), rs.getString("surname"), rs.getString("email"), rs.getString("password"), rs.getInt("postcode"), rs.getString("city"), rs.getString("address"), rs.getInt("phone"), rs.getBoolean("active"));
                    dataList.add(m);

                } else if (table.equals("comment")) {
                    Date d = rs.getDate("comment_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Comment c = new Comment(rs.getInt("comment_id"), date, rs.getString("message"), rs.getInt("member_id"));
                    dataList.add(c);
                } else if (table.equals("booking")) {
                    Date edate = rs.getDate("entrydate");
                    Date exdate = rs.getDate("exitdate");
                    LocalDateTime entry_date = Instant
                            .ofEpochMilli(edate.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    LocalDateTime exit_date = Instant
                            .ofEpochMilli(exdate.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();

                    Booking b = new Booking(rs.getInt("booking_id"), entry_date, exit_date, rs.getInt("kilos"), rs.getInt("total"), rs.getInt("member_id"));
                    dataList.add(b);
                } else if (table.equals("payment")) {
                    Date d = rs.getDate("pay_date");
                    LocalDateTime data = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Payment p = new Payment(rs.getInt("payment_id"), rs.getString("description"), data, (float) rs.getInt("total"), rs.getInt("member_id"));
                    dataList.add(p);
                } else if (table.equals("metalbin")) {

                    Date d = rs.getDate("available_date");
                    LocalDateTime data = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Metalbin m = new Metalbin(rs.getInt("metalbin_id"), rs.getString("name"), rs.getBoolean("available"), data);
                    dataList.add(m);
                    dataList.add(m);//aki luego abra k añadir con INSERT INTO metalbin (available_date) VALUES (?) WHERE metalbin_id = ?

                } else if (table.equals("production")) {
                    Date d = rs.getDate("production_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();

                    Production p = new Production(rs.getInt("production_id"), (float) rs.getInt("kilos"), (float) rs.getInt("total"), rs.getInt("booking_id"), rs.getInt("metalbin_id"), date);
                    dataList.add(p);
                } else if (table.equals("booking_1")) {
                    Date edate = rs.getDate("entrydate");
                    Date exdate = rs.getDate("exitdate");
                    LocalDateTime entry_date = Instant
                            .ofEpochMilli(edate.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    LocalDateTime exit_date = Instant
                            .ofEpochMilli(exdate.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    LocalDateTime datak[] = {entry_date, exit_date};
                    dataList.add(datak);

                } else if (table.equals("inventory")) {
                    Inventory in = new Inventory(rs.getInt("Item_Id"), rs.getString("model"), rs.getString("comment"));
                    dataList.add(in);
                } else if (table.equals("notification")) {
                    Notification no = new Notification(rs.getInt("notification_id"), rs.getString("message"));
                    dataList.add(no);
                } else if (table.equals("notify")) {
                    Date d = rs.getDate("notification_date");
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
        //LocalDateTime data = newMember.getDate; falta por crear birthday
        String sql = "INSERT INTO member(email, name, surname, password, city, postcode, address, phone, active) VALUES (?,?,?,?,?,?,?,?,?)";
        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, newMember.getEmail());
            pstmt.setString(2, newMember.getName());
            pstmt.setString(3, newMember.getSurname());
            pstmt.setString(4, newMember.getPassword());
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

        return done;
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

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setBoolean(1, true);
            pstmt.setInt(2, id);
            pstmt.executeUpdate();
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

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {

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

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {
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
     * @param itemId it takes the id of the item you want erase
     * @return a boolean that indicates if the operation has been succesfull
     */
    public boolean deleteInventory(int itemId){
        boolean done = false;
        String sql = "DELETE FROM inventory WHERE item_id = ?";
        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)){
            pstmt.setInt(1, itemId);
            pstmt.executeUpdate();
            done =true;
        }catch(SQLException e){
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
        boolean done2 = false;
        /*  convert datetime to numbers
        int dateinnums;
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyMMddHHmm");
        LocalDateTime now = LocalDateTime.now();
        String date = "" + now.format(formatter);;
        dateinnums = Integer.parseInt(date);
         */
        Notify alert = new Notify(member_id, notification.getNotification_id(), LocalDateTime.now(), false);
        String sql = "INSERT INTO notification(notification_id, message) VALUES (?,?)";
        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setInt(1, notification.getNotification_id());
            pstmt.setString(2, notification.getMessage());

            pstmt.execute();
            done2 = true;

        } catch (SQLException e) {
            System.out.println("Error inserting notification");
            System.out.println(e.getMessage());
        }

        sql = "INSERT INTO notify(member_id, notification_id, seen) VALUES (?,?,?)";

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setInt(1, alert.getMember_id());
            pstmt.setInt(2, alert.getNotification_id());
            pstmt.setBoolean(3, false);
            //en la base de datos poner por defecto el valor del tiempo actual con el metodo now()
            pstmt.executeUpdate();
            if (done2 == true) {
                done = true;
            }

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
        String sql = "INSERT INTO payment(description, total, pay_date, member_id) VALUES(?,?,?,?)";//pay_date: en la base de datos poner por defecto el valor del tiempo actual con el metodo now()
        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, transfer.getDescription());
            pstmt.setInt(2, (int) transfer.getTotal());

            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
            String formattedDateTime = transfer.getDate().format(formatter);

            pstmt.setString(3, formattedDateTime);
            pstmt.setInt(4, transfer.getMember_id());
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

        try (Connection con = connect(); PreparedStatement pstmt = con.prepareStatement(sql)) {
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
}
