/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.tables;

import model.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.mainclass.Notify;

//this class is the model for the notfications frame
public class NotificationsTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Notify> notification_list = new ArrayList<>();//stores data for the table
    private String[] titles = {"ID", "NOTIFICATION", "DATE", "SEEN"};//sets table col titles

    public NotificationsTable() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "notify");
        for (Object x : array) {
            notification_list.add((Notify) x);
        }
    }

    @Override
    public int getRowCount() {
        return notification_list.size();
    }

    @Override
    public int getColumnCount() {
        return titles.length;
    }

    @Override
    public String getColumnName(int column) {
        return titles[column];
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {
            case 0:
                return notification_list.get(rowIndex).getMember_id();
            case 1:
                return notification_list.get(rowIndex).getNotification_id();
            case 2:
                return notification_list.get(rowIndex).getNotification_date();
            case 3:
                return notification_list.get(rowIndex).isSeen();
            default:
                return null;
        }
    }
}
