/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Member;

/**
 *
 * @author kalboetxeaga.ager
 */
public class MembersTable extends AbstractTableModel{
    private Management man= new Management();
    private ArrayList<Member> members_list = new ArrayList<>();
    private String[] titles;
    public MembersTable(){
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "member");
        for(Object x : array){
            members_list.add((Member)x);
        }
    }
    @Override
    public int getRowCount() {
        return members_list.size();
    }

    @Override
    public int getColumnCount() {
        return titles.length;
    }
    
    @Override
    public String getColumnName(int column){
        return titles[column];
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {
            case 0:
                return members_list.get(rowIndex).getMember_id();
            case 1:
                return members_list.get(rowIndex).getName();
            case 2:
                return members_list.get(rowIndex).getSurname();
            case 3:
                return members_list.get(rowIndex).getEmail();
            case 4:
                return members_list.get(rowIndex).getPassword();
            case 5:
                return members_list.get(rowIndex).getPostCode();
            case 6:
                return members_list.get(rowIndex).getCity();
            case 7:
                return members_list.get(rowIndex).getAddress();
            case 8:
                return members_list.get(rowIndex).getPhone();
            default:
                return null;
        }
    }
}
