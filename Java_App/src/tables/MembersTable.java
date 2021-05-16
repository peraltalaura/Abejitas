/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tables;

import controllers.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Member;

/**
 *
 * @author kalboetxeaga.ager
 */
public class MembersTable extends AbstractTableModel {

    private Management man = new Management();
    private int member_count;
    private ArrayList<Member> members_list=new ArrayList<>();
    private final String[] TITLES = {"MEMBER ID", "NAME", "SURNAME", "E-MAIL", "PASSWORD", "POST CODE", "CITY", "ADDRESS", "PHONE", "ACTIVE"};

    public MembersTable() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "member");
        for (Object x : array) {
            members_list.add((Member) x);
            member_count++;
        }
    }

    public void activate(int memberId) {
         for (Member m : members_list) {
            if (m.getMember_id() == memberId) {
                m.setActive(true);
                break;
            }
        }
         this.fireTableDataChanged();
    }

    public void disable(int memberId) {
        for (Member m : members_list) {
            if (m.getMember_id() == memberId) {
                m.setActive(false);
                break;
            }
        }
        this.fireTableDataChanged();
    }
    
    public void addMember(Member m){
        members_list.add(m);
        this.fireTableDataChanged();
        this.member_count++;
    }

    public void setMember_count(int member_count) {
        this.member_count = member_count;
    }

    public int getMember_count() {
        return member_count;
    }

    public ArrayList<Member> getMembers_list() {
        return members_list;
    }

    @Override
    public int getRowCount() {
        return members_list.size();
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
            case 9:
                return members_list.get(rowIndex).isActive();
            default:
                return null;
        }
    }
}
