/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controllers;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.time.LocalDateTime;
import java.util.ArrayList;
import javax.swing.JOptionPane;
import mainclass.*;
import tables.*;
import view.*;

/**
 *
 * @author peralta.laura
 */
public class HomeController implements ActionListener {

    //The home class declaration
    private Home home;

    //The different views class declaration
    private Members members;
    private Payments payments;
    private Availability available;
    private Materials inventory;
    private Comments comments;
    private MemberNotifications notificationsFrame;

    //management class declaration
    private Management man;

    //jTable model declaration and initialization
    private MembersTable membersTable;
    private PaymentsTable paymentTable;
    private BookingsTable bookingsTable;
    private InventoryTable inventoryTable;
    private CommentsTable commentsTable;
    private MetalbinTable metalbinsTable;
    private NotificationsTable notificationsTable;

    //declaration of the notifications
    private ArrayList<Notification> notifications = new ArrayList<>();

    private int adminId = 1;

    /**
     * The constructor of HomeController
     *
     * @param home the menu
     * @param man the Management, which will be used for all the functions of
     * the menu
     */
    public HomeController(Home home, Members members, Payments payments, Availability available, Materials inventory, Comments comments, Management man, MemberNotifications notificationsFrame) {
        this.home = home;
        this.members = members;
        this.payments = payments;
        this.available = available;
        this.inventory = inventory;
        this.comments = comments;
        this.notificationsFrame = notificationsFrame;
        this.man = man;
        this.fillNotifications();
        home.setVisible(true);
        membersTable = new MembersTable();
        home.members.setText("" + membersTable.getMember_count());
        homeActionListener(this);
    }

    /**
     * it will detect the actions from the buttons on the menu
     *
     * @param e
     */
    @Override
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        switch (actionCommand) {
            //each of the manage cases go to their respectfull jframe
            case "MANAGE MEMBERS":
                members.memberjTable.setModel(membersTable);
                members.setVisible(true);
                memberActionListener(this);
                break;

            case "MANAGE AVAILABILITY":
                bookingsTable = new BookingsTable();
                metalbinsTable = new MetalbinTable();
                available.jTableBookings.setModel(bookingsTable);
                available.jTableMetal.setModel(metalbinsTable);
                available.setVisible(true);
                break;

            case "MANAGE INVENTORY":
                inventoryTable = new InventoryTable();
                inventory.jTableInventory.setModel(inventoryTable);
                inventory.setVisible(true);
                inventoryActionListener(this);
                break;

            case "MANAGE PAYMENTS":
                paymentTable = new PaymentsTable();
                payments.jTablePayments.setModel(paymentTable);
                payments.setVisible(true);
                paymentActionListener(this);
                break;

            case "MANAGE COMMENTS":
                commentsTable = new CommentsTable();
                comments.jTableCommentsTable.setModel(commentsTable);
                comments.setVisible(true);
                commentActionListener(this);
                break;

            case "SEE NOTIFICATIONS":
                notificationsTable = new NotificationsTable();
                notificationsFrame.jTableNotifications.setModel(notificationsTable);
                notificationsFrame.setVisible(true);
                commentActionListener(this);
                break;

            //when the activate button is clicked it calls the activateMember() function from Management
            case "ACTIVATE":
                try {
                ArrayList<Member> mlist;
                mlist = membersTable.getMembers_list();
                int disID = mlist.get(members.memberjTable.getSelectedRow()).getMember_id();
                man.activateMember(disID);
                membersTable.activate(disID);
            } catch (Exception E) {
                System.out.println("error when disabling");
            }
            break;
            //when the disable button is clicked it calls the diasbleMember() function from Management
            case "DISABLE":
                try {
                ArrayList<Member> mlist;
                mlist = membersTable.getMembers_list();
                int disID = mlist.get(members.memberjTable.getSelectedRow()).getMember_id();
                man.disableMember(disID);
                membersTable.disable(disID);
            } catch (Exception E) {
                System.out.println("error when disabling");
            }
            break;
            //when the activate button is clicked it puts the data from the textfields into a Member object and calls the insertMember()function to add a member to the database
            case "SUBMIT":
                Member mem = new Member(members.jTextFieldName.getText(), members.jTextFieldSurname.getText(), members.jTextFieldEmail.getText(),
                        members.jTextFieldPassword.getText(), Integer.parseInt(members.jTextFieldPostcode.getText()), members.jTextFieldCity.getText(),
                        members.jTextFieldAdress.getText(), Integer.parseInt(members.jTextFieldPhone.getText()), false);
                man.insertMember(mem);
                membersTable.addMember(mem);
                break;
            //when it is clicked it takes the description and import and registers a new payment on the database
            case "PAY":
                try {
                String description = payments.jTextFieldPDescription.getText();
                LocalDateTime now = LocalDateTime.now();
                float total = Float.parseFloat(payments.jTextFieldPTotal.getText());
                Payment pay = new Payment(description, now, total, adminId);
                man.registerPayment(pay);
                paymentTable.addPayment(pay);
                System.out.println("payment done");
            } catch (Exception E) {
                System.out.println("error when paying");
            }
            break;

            //when it is clicked it displays the payments depending on the id introduced
            case "SEARCH":
                try {
                int memberID = Integer.parseInt(payments.jTextFieldID.getText());
                paymentTable.searchMemberPayments(memberID);
                System.out.println("filter done");
            } catch (Exception E) {
                System.out.println("filter error");
            }
            break;

            case "RESET":
                paymentTable.resetList();
                break;

            case "ADD ITEM":
                try {
                Inventory in = new Inventory(inventory.jTextFieldModel.getText(), inventory.jTextFieldComment.getText());
                man.addInventory(in);
                inventory.jTextFieldComment.setText("");
                inventory.jTextFieldModel.setText("");
                inventoryTable.addToInventory(in);
                System.out.println("update done");
            } catch (Exception E) {
                System.out.println("Error adding item");
                System.out.println(E);
            }
            break;
            case "DELETE COMMENT":
                //Aqui meter notify al usuario de esa id de tipo mal comentario?
                int ic = JOptionPane.showConfirmDialog(inventory, "Are you sure?");
                if (ic == 0) {
                    try {
                        ArrayList<Comment> c;
                        c = commentsTable.getComments();
                        int dcom = c.get(comments.jTableCommentsTable.getSelectedRow()).getComment_id();
                        int comMember=c.get(comments.jTableCommentsTable.getSelectedRow()).getMember_id();                      
                        man.deleteComment(dcom);
                        man.sendWarning(notifications.get(2), comMember);
                        commentsTable.deleteComment(dcom);
                        System.out.println("Comment succesfully deleted");
                    } catch (Exception E) {
                        System.out.println("something went wrong deleting a comment");
                        System.out.println(E);
                    }
                } else {
                    JOptionPane.showMessageDialog(inventory, "The Operation has been succesfully cancelled");
                }

                break;
            case "DELETE ITEM":
                int i = JOptionPane.showConfirmDialog(inventory, "Are you sure?");
                if (i == 0) {
                    try {
                        ArrayList<Inventory> is;
                        is = inventoryTable.getMaterials();
                        int iId = is.get(inventory.jTableInventory.getSelectedRow()).getItem_id();
                        man.deleteInventory(iId);
                        inventoryTable.removeFromInventory(iId);
                        System.out.println("Item succesfully deleted");
                        JOptionPane.showMessageDialog(inventory, "The message has been removed");
                    } catch (Exception ex) {
                        System.out.println("Error deleting item");
                        System.out.println(ex);
                    }

                } else {
                    JOptionPane.showMessageDialog(inventory, "The Operation has been succesfully cancelled");
                }

        }
    }

    /**
     * a method that puts listener to the buttons of the home frame when it is
     * initialized
     *
     * @param listener
     */
    public void homeActionListener(ActionListener listener) {
        //payments.jButtonPay.addActionListener(listener);
        home.MEMBERS.addActionListener(listener);
        home.AVAILABILITY.addActionListener(listener);
        home.COMMENTS.addActionListener(listener);
        home.PAYMENTS.addActionListener(listener);
        home.INVENTORY.addActionListener(listener);
        home.NOTIFICATIONS.addActionListener(listener);
    }

    /**
     * a method that puts listener to the buttons of the member frame when it is
     * initialized
     *
     * @param listener
     */
    public void memberActionListener(ActionListener listener) {
        //payments.jButtonPay.addActionListener(listener);
        members.jButtonInsertMember.addActionListener(listener);
        members.jButtonDisable.addActionListener(listener);
        members.jButtonActivate.addActionListener(listener);
    }

    /**
     * a method that puts listener to the buttons of the payment frame when it
     * is initialized
     *
     * @param listener
     */
    public void paymentActionListener(ActionListener listener) {
        payments.jButtonPay.addActionListener(listener);
        payments.jButtonSearch.addActionListener(listener);
        payments.jButtonReset.addActionListener(listener);
    }

    /**
     *
     * @param listener
     */
    public void availabilityActionListener(ActionListener listener) {

    }

    public void inventoryActionListener(ActionListener listener) {
        inventory.jButtonAddItem.addActionListener(listener);
        inventory.jButtonDeleteItem.addActionListener(listener);
    }

    public void commentActionListener(ActionListener listener) {
        comments.jButtonDeleteComment.addActionListener(listener);
    }

    public void fillNotifications() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "notification");
        for (Object x : array) {
            notifications.add((Notification) x);
        }
    }
}
