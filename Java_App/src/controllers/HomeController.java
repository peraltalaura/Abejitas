/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controllers;

import view.Frames.Payments;
import view.Frames.Members;
import view.Frames.Home;
import view.Frames.MemberNotifications;
import view.Frames.Materials;
import view.Frames.Availability;
import view.Frames.Comments;
import model.tables.PaymentsTable;
import model.tables.MetalbinTable;
import model.tables.InventoryTable;
import model.tables.MembersTable;
import model.tables.NotificationsTable;
import model.tables.CommentsTable;
import model.tables.BookingsTable;
import model.mainclass.Inventory;
import model.mainclass.Payment;
import model.mainclass.Comment;
import model.mainclass.Notification;
import model.mainclass.Member;
import model.Management;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author peralta.laura
 */
public class HomeController implements ActionListener {

    //The home class declaration
    public Home home;

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
//         try {
//            this.home.setContentPane(new JLabel(new ImageIcon(ImageIO.read(new File("C:\\Users\\kalboetxeaga.ager\\Downloads\\Boton_Muestra-20210519T060314Z-001\\Abejitas\\Java_App\\src\\Prueba.jpg")))));
//        } catch (IOException e) {
//            e.printStackTrace();
//        }
        this.home.setVisible(true);
        this.home.setLocationRelativeTo(null);
        membersTable = new MembersTable();
        home.members.setText("" + membersTable.getMember_count());
        //adding listeners
        homeActionListener(this);
        memberActionListener(this);
        inventoryActionListener(this);
        paymentActionListener(this);
        commentActionListener(this);
        
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
                members.setLocationRelativeTo(null);
                break;
            
            case "SEE AVAILABILITY":
                bookingsTable = new BookingsTable();
                metalbinsTable = new MetalbinTable();
                available.jTableBookings.setModel(bookingsTable);
                available.jTableMetal.setModel(metalbinsTable);
                available.setVisible(true);
                available.setLocationRelativeTo(null);
                break;
            
            case "MANAGE INVENTORY":
                inventoryTable = new InventoryTable();
                inventory.jTableInventory.setModel(inventoryTable);
                inventory.setVisible(true);
                inventory.setLocationRelativeTo(null);
                
                break;
            
            case "MANAGE PAYMENTS":
                paymentTable = new PaymentsTable();
                payments.jTablePayments.setModel(paymentTable);
                payments.jLabelBalance.setText("" + paymentTable.getBalance() + " €");
                payments.setVisible(true);
                payments.setLocationRelativeTo(null);
                
                break;
            
            case "MANAGE COMMENTS":
                commentsTable = new CommentsTable();
                comments.jTableCommentsTable.setModel(commentsTable);
                comments.setVisible(true);
                comments.setLocationRelativeTo(null);
                
                break;
            
            case "SEE NOTIFICATIONS":
                notificationsTable = new NotificationsTable();
                notificationsFrame.jTableNotifications.setModel(notificationsTable);
                notificationsFrame.setVisible(true);
                notificationsFrame.setLocationRelativeTo(null);
                
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
                
                boolean fail_1 = false;
                
                if (!members.jTextFieldName.getText().isEmpty() && !members.jTextFieldSurname.getText().isEmpty() && !members.jTextFieldEmail.getText().isEmpty()) {
                    //name comprobation
                    for (char c : members.jTextFieldName.getText().toCharArray()) {
                        if (!Character.isLetterOrDigit(c)) {
                            fail_1 = true;
                        }
                    }
                    //surname comprobation
                    for (char c : members.jTextFieldSurname.getText().toCharArray()) {
                        if (!Character.isLetter(c)) {
                            fail_1 = true;
                        }
                        
                    }
                    //email comprobation
                    boolean isarroba = false;
                    if (!members.jTextFieldEmail.getText().equals("")) {
                        for (char c : members.jTextFieldEmail.getText().toCharArray()) {
                            
                            if (c == '@') {
                                isarroba = true;
                            }
                            
                        }
                        if (isarroba == false) {
                            fail_1 = true;
                        }
                        
                    }
                    //simple insert of member
                    if (fail_1 == false) {
                        if (members.jTextFieldPassword.getText().equals("")) {
                            String unformatted_date = "25/12/1999";
                            try {
                                Date date = new SimpleDateFormat("dd/MM/yyyy").parse(unformatted_date);
                                Member mem = new Member(members.jTextFieldName.getText(), members.jTextFieldSurname.getText(), members.jTextFieldEmail.getText());
                                man.insertMember(mem);
                                membersTable.addMember(mem);
                                members.jTextFieldName.setText("");
                                members.jTextFieldSurname.setText("");
                                members.jTextFieldEmail.setText("");
                                members.jTextFieldPassword.setText("");
                                members.jTextFieldCity.setText("");
                                members.jTextFieldAdress.setText("");
                                members.jTextFieldPhone.setText("");
                                members.jTextFieldPostcode.setText("");
                            } catch (ParseException ex) {
                                Logger.getLogger(HomeController.class.getName()).log(Level.SEVERE, null, ex);
                            }
                        } else {
                            //adress comprobation
                            for (char c : members.jTextFieldAdress.getText().toCharArray()) {
                                if (!Character.isLetter(c)) {
                                    fail_1 = true;
                                }
                            }
                            //city comprobation
                            for (char c : members.jTextFieldCity.getText().toCharArray()) {
                                if (!Character.isLetter(c)) {
                                    fail_1 = true;
                                }
                            }
                            //
                            for (char c : members.jTextFieldPassword.getText().toCharArray()) {
                                if (!Character.isLetter(c)) {
                                    fail_1 = true;
                                }
                            }
                            for (char c : members.jTextFieldPhone.getText().toCharArray()) {
                                if (!Character.isDigit(c)) {
                                    fail_1 = true;
                                }
                            }
                            for (char c : members.jTextFieldPostcode.getText().toCharArray()) {
                                if (!Character.isDigit(c)) {
                                    fail_1 = true;
                                }
                            }
                            //complete member adding
                            if (fail_1 == false) {
                                String unformatted_date = members.jTextFieldBirthday.getText();
                                try {
                                    Date date = new SimpleDateFormat("dd/MM/yyyy").parse(unformatted_date);
                                    Member mem = new Member(members.jTextFieldName.getText(), members.jTextFieldSurname.getText(), members.jTextFieldEmail.getText(),
                                            members.jTextFieldPassword.getText(), date, Integer.parseInt(members.jTextFieldPostcode.getText()), members.jTextFieldCity.getText(),
                                            members.jTextFieldAdress.getText(), Integer.parseInt(members.jTextFieldPhone.getText()));
                                    man.insertMember(mem);
                                    membersTable.addMember(mem);
                                    members.jTextFieldName.setText("");
                                    members.jTextFieldSurname.setText("");
                                    members.jTextFieldEmail.setText("");
                                    members.jTextFieldPassword.setText("");
                                    members.jTextFieldCity.setText("");
                                    members.jTextFieldAdress.setText("");
                                    members.jTextFieldPhone.setText("");
                                    members.jTextFieldPostcode.setText("");
                                } catch (ParseException ex) {
                                    Logger.getLogger(HomeController.class.getName()).log(Level.SEVERE, null, ex);
                                }
                            } else {
                                JOptionPane.showMessageDialog(payments, "You must write valid characters");
                                members.jTextFieldName.setText("");
                                members.jTextFieldSurname.setText("");
                                members.jTextFieldEmail.setText("");
                                members.jTextFieldPassword.setText("");
                                members.jTextFieldCity.setText("");
                                members.jTextFieldAdress.setText("");
                                members.jTextFieldPhone.setText("");
                                members.jTextFieldPostcode.setText("");
                            }
                        }
                        
                    } else {
                        JOptionPane.showMessageDialog(payments, "You must write valid characters");
                        members.jTextFieldName.setText("");
                        members.jTextFieldSurname.setText("");
                        members.jTextFieldEmail.setText("");
                        members.jTextFieldPassword.setText("");
                        members.jTextFieldCity.setText("");
                        members.jTextFieldAdress.setText("");
                        members.jTextFieldPhone.setText("");
                        members.jTextFieldPostcode.setText("");
                    }
                    
                } else {
                    JOptionPane.showMessageDialog(payments, "You must write valid characters");
                    members.jTextFieldName.setText("");
                    members.jTextFieldSurname.setText("");
                    members.jTextFieldEmail.setText("");
                    members.jTextFieldPassword.setText("");
                    members.jTextFieldCity.setText("");
                    members.jTextFieldAdress.setText("");
                    members.jTextFieldPhone.setText("");
                    members.jTextFieldPostcode.setText("");
                    
                }
                
                break;

            //when it is clicked it takes the description and import and registers a new payment on the database
            case "PAY":
                boolean fail_2 = false;
                if (payments.jTextFieldPDescription.getText().isEmpty() || payments.jTextFieldPTotal.getText().isEmpty()) {
                    fail_2 = true;
                }
                for (char c : payments.jTextFieldPDescription.getText().toCharArray()) {
                    if (!Character.isLetter(c)) {
                        fail_2 = true;
                    }
                }
                for (char c : payments.jTextFieldPTotal.getText().toCharArray()) {
                    if (!Character.isDigit(c)) {
                        fail_2 = true;
                    }
                }
                if (fail_2 == false) {
                    try {
                        String description = payments.jTextFieldPDescription.getText();
                        LocalDateTime now = LocalDateTime.now();
                        float total = Float.parseFloat(payments.jTextFieldPTotal.getText());
                        Payment pay = new Payment(description, now, total, adminId);
                        man.registerPayment(pay);
                        paymentTable.addPayment(pay);
                        payments.jTextFieldPDescription.setText("");
                        payments.jTextFieldPTotal.setText("");
                        payments.jLabelBalance.setText("" + paymentTable.getBalance() + " €");
                        System.out.println("payment done");
                    } catch (Exception E) {
                        System.out.println("error when paying");
                    }
                } else {
                    JOptionPane.showMessageDialog(payments, "You must write valid characters");
                    payments.jTextFieldPDescription.setText("");
                    payments.jTextFieldPTotal.setText("");
                }
                
                break;
            case "SEND NOTIFICATION":
                try{
                    man.balanceNotification(Integer.parseInt(payments.jTextFieldID.getText()));
                }catch(Exception E){
                    System.out.println("Error");
                }
                
                
                break;

            //when it is clicked it displays the payments depending on the id introduced
            case "SEARCH":
                paymentTable.resetList();
                boolean fail_3 = false;
                if (payments.jTextFieldID.getText().isEmpty()) {
                    fail_3 = true;
                } else {
                    for (char x : payments.jTextFieldID.getText().toCharArray()) {
                        
                        if (!Character.isDigit(x)) {
                            fail_3 = true;
                        }
                    }
                }
                
                if (fail_3 == false) {
                    try {
                        int memberID = Integer.parseInt(payments.jTextFieldID.getText());
                        paymentTable.searchMemberPayments(memberID);
                        if(paymentTable.searchMemberPayments(memberID)==true){
                            payments.jLabelBalance.setText("" + paymentTable.getBalance() + " €");
                            System.out.println("filter done");
                        }else{
                            JOptionPane.showMessageDialog(payments, "Sorry, we could not find the member");
                            payments.jTextFieldID.setText("");
                        }
                        
                    } catch (Exception E) {
                        System.out.println("filter error");
                    }
                } else {
                    JOptionPane.showMessageDialog(payments, "Check and try again.");
                    payments.jTextFieldID.setText("");
                }
                
                break;
            // when its clicked it refresh the table of payments
            case "RESET":
                paymentTable.resetList();
                payments.jLabelBalance.setText("" + paymentTable.getBalance()+" €");
                payments.jTextFieldID.setText("");
                break;
            //when its clicked this case adds the submitted item into items table
            case "ADD ITEM":
                
                boolean fail_4 = false;
                String getModel = inventory.jTextFieldModel.getText();
                if (inventory.jTextFieldComment.getText().isEmpty() || inventory.jTextFieldModel.getText().isEmpty()) {
                    fail_4 = true;
                }
                for (char c : inventory.jTextFieldModel.getText().toCharArray()) {
                    if (!Character.isLetter(c)) {
                        
                        fail_4 = true;
                    }
                }
                for (char c : inventory.jTextFieldComment.getText().toCharArray()) {
                    if (!Character.isLetter(c)) {
                        fail_4 = true;
                    }
                }
                if (fail_4 == false) {
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
                } else {
                    JOptionPane.showMessageDialog(inventory, "You must write valid characters");
                    inventory.jTextFieldComment.setText("");
                    inventory.jTextFieldModel.setText("");
                }
                
                break;
            //in this case when its pressed it deletes the selected comment
            case "DELETE COMMENT":
                
                int ic = JOptionPane.showConfirmDialog(inventory, "Are you sure?");
                if (ic == 0) {
                    try {
                        ArrayList<Comment> c;
                        c = commentsTable.getComments();
                        int dcom = c.get(comments.jTableCommentsTable.getSelectedRow()).getComment_id();
                        int comMember = c.get(comments.jTableCommentsTable.getSelectedRow()).getMember_id();
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
            //This case deletes the selected item from the item table 
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
        home.INVENTORY.addActionListener(listener);
        home.AVAILABILITY.addActionListener(listener);
        home.COMMENTS.addActionListener(listener);
        home.PAYMENTS.addActionListener(listener);
        home.MEMBERS.addActionListener(listener);
        home.NOTIFICATIONS.addActionListener(listener);
    }

    /**
     * a method that puts listener to the buttons of the member frame when it is
     * initialized
     *
     * @param listener
     */
    public void memberActionListener(ActionListener listener) {
        
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
        payments.jButtonReset1.addActionListener(listener);
        payments.jButtonNotification.addActionListener(listener);
    }

    /**
     * a method that adds a listener to the availability frame buttons when its
     * initialized (obsolete)
     *
     * @param listener
     */
    public void availabilityActionListener(ActionListener listener) {
        
    }

    /**
     * This method adds listeners to the buttons of the inventory frame when its
     * created
     *
     * @param listener
     */
    public void inventoryActionListener(ActionListener listener) {
        inventory.jButtonAddItem.addActionListener(listener);
        inventory.jButtonDeleteItem.addActionListener(listener);
    }

    /**
     * This method adds a listener to the button of the comments management
     * frame when its created
     *
     * @param listener
     */
    public void commentActionListener(ActionListener listener) {
        comments.jButtonDeleteComment.addActionListener(listener);
    }

    /**
     * This method will add notifications from the database into the
     * notifications ArrayList
     */
    public void fillNotifications() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "notification");
        for (Object x : array) {
            notifications.add((Notification) x);
        }
    }
    
}
