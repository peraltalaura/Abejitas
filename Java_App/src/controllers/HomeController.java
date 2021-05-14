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

    private Home home;
    private Members members;
    private Payments payments;
    private Availability available;
    private Materials inventory;
    private Comments comments;
    //management class declaration
    private Management man;
    //jTable model declaration and initialitation
    private MembersTable userTable = new MembersTable();
    private PaymentsTable paymentTable = new PaymentsTable();
    private BookingsTable bookingsTable = new BookingsTable();
    private InventoryTable inventoryTable = new InventoryTable();
    private CommentsTable commentsTable = new CommentsTable();
    private int adminId = 1;

    /**
     * The constructor of HomeController
     *
     * @param home the menu
     * @param man the Management, which will be used for all the functions of
     * the menu
     */
    public HomeController(Home home, Management man) {
        this.home = home;
        this.man = man;
        home.members.setText("" + userTable.getMember_count());
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
                members = Members.membersSortuBistaratu();
                memberActionListener(this);
                break;

            case "MANAGE AVAILABILITY":
                available = Availability.availableSortuBistaratu();
                break;

            case "MANAGE INVENTORY":
                inventory = Materials.inventorySortuBistaratu();
                inventoryActionListener(this);
                break;

            case "MANAGE PAYMENTS":
                payments = Payments.paymenSortuBistaratu();
                paymentActionListener(this);
                break;

            case "MANAGE COMMENTS":
                comments = Comments.commentsSortuBistaratu();
                commentActionListener(this);
                break;

            //when the activate button is clicked it calls the activateMember() function from Management
            case "ACTIVATE":
                try {
                ArrayList<Member> d;
                d = userTable.getMembers_list();
                int mid = d.get(members.memberjTable.getSelectedRow()).getMember_id();
                man.activateMember(mid);
                userTable = new MembersTable();
                members.memberjTable.setModel(userTable);
                userTable.fireTableDataChanged();
            } catch (Exception E) {
                System.out.println("error when activating");
            }
            break;
            //when the disable button is clicked it calls the diasbleMember() function from Management
            case "DISABLE":
                try {
                ArrayList<Member> mlist;
                mlist = userTable.getMembers_list();
                int id = mlist.get(members.memberjTable.getSelectedRow()).getMember_id();
                man.disableMember(id);
                userTable = new MembersTable();
                members.memberjTable.setModel(userTable);
                userTable.fireTableDataChanged();
            } catch (Exception E) {
                System.out.println("error when disabling");
            }
            break;
            //when the activate button is clicked it puts the data from the textfields into a Member object and calls the insertMember()function to add a member to the database
            case "SUBMIT":
                try {
                Member mem = new Member(members.jTextFieldName.getText(), members.jTextFieldSurname.getText(), members.jTextFieldEmail.getText(),
                        members.jTextFieldPassword.getText(), Integer.parseInt(members.jTextFieldPostcode.getText()), members.jTextFieldCity.getText(),
                        members.jTextFieldAdress.getText(), Integer.parseInt(members.jTextFieldPhone.getText()), false);
                man.insertMember(mem);
                userTable = new MembersTable();
                members.memberjTable.setModel(userTable);
                userTable.fireTableDataChanged();
                userTable.setMember_count(userTable.getMember_count() + 1);
                System.out.println("Submited");
                break;
            } catch (Exception E) {
                System.out.println("Error when submiting");
            }
            break;
            //when it is clicked it takes the description and import and registers a new payment on the database
            case "PAY":
                try {
                String description = payments.jTextFieldPDescription.getText();
                LocalDateTime now = LocalDateTime.now();
                float total = Float.parseFloat(payments.jTextFieldPTotal.getText());
                Payment pay = new Payment(description, now, total, adminId);
                man.registerPayment(pay);
                paymentTable = new PaymentsTable();
                payments.jTablePayments.setModel(paymentTable);
                paymentTable.fireTableDataChanged();
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
                payments.jTablePayments.setModel(paymentTable);
                paymentTable.fireTableDataChanged();
                System.out.println("filter done");
            } catch (Exception E) {
                System.out.println("filter error");
            }
            break;

            case "RESET":
                this.resetPaymentTable();
                break;

            case "ADD ITEM":
                    try {
                Inventory in = new Inventory(inventory.jTextFieldModel.getText(), inventory.jTextFieldComment.getText());
                man.addInventory(in);
                inventory.jTextFieldComment.setText("");
                inventory.jTextFieldModel.setText("");
                inventoryTable = new InventoryTable();
                inventory.jTable1.setModel(inventoryTable);
                inventoryTable.fireTableDataChanged();
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
                        ArrayList<Object> array = new ArrayList<>();
                        ArrayList<Notification> not = new ArrayList();
                        array = man.readData(array, "notification");
                        for (Object x : array) {
                            not.add((Notification) x); //notification id 3 (o 3.a posicion es el mensaje del comment)
                        }

                        int memberId = c.get(comments.jTableCommentsTable.getSelectedRow()).getMember_id();
                        man.sendWarning(not.get(3), memberId);
//                ArrayList<Comment> clist = commentsTable.getComments();
//                LocalDateTime date = clist.get(comments.jTableCommentsTable.getSelectedRow()).getDate();

//                Comment co = new Comment(date, clist.get(comments.jTableCommentsTable.getSelectedRow()).getMessage(), clist.get(comments.jTableCommentsTable.getSelectedRow()).getMember_id());
                        man.deleteComment(dcom);
                        commentsTable = new CommentsTable();
                        comments.jTableCommentsTable.setModel(commentsTable);
                        commentsTable.fireTableDataChanged();
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
                        int iId = is.get(inventory.jTable1.getSelectedRow()).getItem_id();
                        man.deleteInventory(iId);
                        inventoryTable = new InventoryTable();
                        inventory.jTable1.setModel(inventoryTable);
                        inventoryTable.fireTableDataChanged();
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

    public void resetPaymentTable() {
        paymentTable.resetList();
        paymentTable.searchPayments();
        payments.jTablePayments.setModel(paymentTable);
        paymentTable.fireTableDataChanged();
    }
}