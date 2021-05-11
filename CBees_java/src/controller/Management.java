/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import tables.*;
import mainclass.*;
import java.util.ArrayList;
import java.io.File;
import java.sql.Connection;
import java.sql.DatabaseMetaData;
import java.sql.DriverManager;
import java.sql.*;
import java.lang.Math;
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

    private String url = "204.204.2.1:80/erlete_db";

    private Connection connect() {
        Connection con = null;

        try {
            con = DriverManager.getConnection(url, "root", "dam1");
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            System.out.println("error in the db");
        }
        return con;
    }

    public ArrayList<Object> readData(ArrayList<Object> dataList, String table) {

        String sql = "SELECT * FROM " + table;

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql);  ResultSet rs = pstmt.executeQuery();) {

            while (rs.next()) {
                if (table.equals("member")) {
                    Member m = new Member(rs.getInt("member_id"), rs.getString("name"), rs.getString("surname"), rs.getString("email"), rs.getString("password"), rs.getInt("postcode"), rs.getString("city"), rs.getString("adress"), rs.getInt("phone"));
                    dataList.add(m);

                } else if (table.equals("comment")) {
                    Date d = rs.getDate("data");
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

                    Booking b = new Booking(rs.getInt("booking_id"), entry_date, exit_date, rs.getInt("kilos"), rs.getInt("total") ,rs.getInt("member_id"));
                    dataList.add(b);
                } else if (table.equals("payment")) {
                    Date d = rs.getDate("data");
                    LocalDateTime data = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Payment p = new Payment(rs.getInt("payment_id"), rs.getString("description"), data, (float) rs.getInt("total"), rs.getInt("member_id"));
                    dataList.add(p);
                } else if (table.equals("metalbin")) {
                    Metalbin m = new Metalbin(rs.getInt("metalbin_id"), rs.getString("name"), rs.getBoolean("available"));
                    dataList.add(m);
                } else if (table.equals("production")) {
                    Date d = rs.getDate("entry_date");
                    LocalDateTime date = Instant
                            .ofEpochMilli(d.getTime())
                            .atZone(ZoneId.systemDefault())
                            .toLocalDateTime();
                    Production p = new Production(rs.getInt("production_id"), (float) rs.getInt("kilos"), (float) rs.getInt("total"),rs.getInt("booking_id"), rs.getInt("metalbin_id"));
                    dataList.add(p);
                } else if (table.equals("production")) { //no se usa
                    HoneyBin h = new HoneyBin(rs.getInt("production_id"), rs.getInt("kilos"), rs.getInt("total"),rs.getInt("booking_id"), rs.getInt("metalbin_id"));
                    dataList.add(h);
                    //si es booking_1 se refiere a solo availability
                    // si es metalbin_1 se refiere a solo availability
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
                } else if (table.equals("metalbin_1")) {
                    dataList.add(rs.getBoolean("available"));
                }else if (table.equals("inventory")){
                    Inventory in = new Inventory(rs.getInt("Item_Id"), rs.getString("model"), rs.getString("comment"));
                }
            }
            return dataList;

        } catch (Exception ex) {
            System.out.println("fail doing consult");
            System.out.println(ex.getMessage());
        }

        return dataList;
    }

    public boolean insertMember(Member newMember) {
        boolean done = false;
        //LocalDateTime data = newMember.getDate; falta por crear birthday
        String sql = "INSERT INTO member(email, name, surname, password, city, postcode, address, phone) VALUES (?,?,?,?,?,?,?,?)";
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, newMember.getEmail());
            pstmt.setString(2, newMember.getName());
            pstmt.setString(3, newMember.getSurname());
            pstmt.setString(4, newMember.getPassword());
            pstmt.setString(5, newMember.getCity());
            pstmt.setInt(6, newMember.getPostCode());
            pstmt.setString(7, newMember.getAddress());
            pstmt.setInt(8, newMember.getPhone());
            pstmt.executeUpdate();
            done = true;
        } catch (SQLException e) {
            System.out.println("fail on insert");
            System.out.println(e.getMessage());

        }

        return done;
    }

    public boolean deleteMember(Member exMember) {
        boolean done = false;
        String sql = "DELETE FROM member WHERE member_id = ?";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setInt(1, exMember.getMember_id());
            pstmt.executeUpdate();
            return true;

        } catch (SQLException e) {
            System.out.println("fail deleting a member");
            System.out.println(e.getMessage());

        }
        return done;
    }

    public boolean deleteComment(Comment badComment) {
        boolean done = false;
        String sql = "DELETE FROM comment WHERE comment_id = ?";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setInt(1, badComment.getComment_id());
            pstmt.executeUpdate();
            done = true;

        } catch (SQLException e) {
            System.out.println("Fail deleting comment");
            System.out.println(e.getMessage());
        }

        return done;
    }

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
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {

            pstmt.setInt(1, notification.getNotification_id());
            pstmt.setString(2, notification.getMessage());

            pstmt.execute();
            done2 = true;

        } catch (SQLException e) {
            System.out.println("Error inserting notification");
            System.out.println(e.getMessage());
        }

        sql = "INSERT INTO notify(member_id, notification_id, seen) VALUES (?,?,?)";

        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
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

    public boolean registerPayment(Payment transfer) {
        boolean done = false;
        String sql = "INSERT INTO payment(description, total, member_id) VALUES(?,?,?)";//pay_date: en la base de datos poner por defecto el valor del tiempo actual con el metodo now()
        try ( Connection con = connect();  PreparedStatement pstmt = con.prepareStatement(sql)) {
            pstmt.setString(1, transfer.getDescription());
            pstmt.setInt(2, (int) transfer.getTotal());
            done = true;

        } catch (SQLException e) {
            System.out.println("Error in the transaction");
            System.out.println(e.getMessage());
        }

        return done;
    }

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
}
