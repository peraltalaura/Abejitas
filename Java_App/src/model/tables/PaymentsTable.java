package model.tables;

import model.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.mainclass.Payment;
//this class is the model for the payments frame

public class PaymentsTable extends AbstractTableModel {

    private Management man = new Management();
    private ArrayList<Payment> payments_list = new ArrayList<>();//stores data for the table
    private final String[] TITLES = {"ID", "DESCRIPTION", "DATE", "TOTAL €", "MEMBER"};//sets table col titles
    private int balance;

    public PaymentsTable() {
        searchPayments();
        accountBalance();
    }

    public void searchPayments() {
        ArrayList<Object> array = new ArrayList<>();

        array = man.readData(array, "payment");
        for (Object x : array) {
            payments_list.add((Payment) x);
        }
         accountBalance();
    }

    public void accountBalance() {
        balance = 0;
        for (Payment p : payments_list) {
            balance += p.getTotal();
        }
    }

    public boolean searchMemberPayments(int memberID) {
        boolean found= false;
        ArrayList<Payment> filterPayments = new ArrayList<>();
        for (Payment p : payments_list) {
            if (p.getMember_id() == memberID) {
                filterPayments.add(p);
                found = true;
            }
        }
        this.payments_list = filterPayments;
        accountBalance();
        this.fireTableDataChanged();
        return found;
    }

    public void addPayment(Payment p) {
        p.setPayment_id(payments_list.get(payments_list.size()-1).getPayment_id()+1);
        payments_list.add(p);
        accountBalance();
        this.fireTableDataChanged();
    }

    public void resetList() {
        payments_list.removeAll(payments_list);
        this.searchPayments();
        this.fireTableDataChanged();
    }

    public ArrayList<Payment> getPayments_list() {
        return payments_list;
    }

    public int getBalance() {
        return balance;
    }
    
    public void setPayments_list(ArrayList<Payment> payments_list) {
        this.payments_list = payments_list;
    }

    @Override
    public int getRowCount() {
        return payments_list.size();
    }

    @Override
    public int getColumnCount() {
        return TITLES.length;
    }

    @Override
    public String getColumnName(int column) {
        return TITLES[column];
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {
            case 0:
                return payments_list.get(rowIndex).getPayment_id();
            case 1:
                return payments_list.get(rowIndex).getDescription();
            case 2:
                return payments_list.get(rowIndex).getDate();
            case 3:
                return payments_list.get(rowIndex).getTotal();
            case 4:
                return payments_list.get(rowIndex).getMember_id();

            default:
                return null;
        }
    }

}
