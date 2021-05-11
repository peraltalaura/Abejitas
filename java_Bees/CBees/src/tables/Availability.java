package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Booking;


public class Availability extends AbstractTableModel {

    private Management man= new Management();
    public ArrayList<Booking> occupied_list = new ArrayList<>();
    private String[] titles;
    public Availability(){
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "booking");
        for(Object x : array){
            occupied_list.add((Booking)x);
        }
    }
    
    @Override
    public int getRowCount() {
        return occupied_list.size();
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
                return occupied_list.get(rowIndex).getBooking_id();
            case 1:
                return occupied_list.get(rowIndex).getEntryDate();
            case 2:
                return occupied_list.get(rowIndex).getExitDate();
            case 3:
                return occupied_list.get(rowIndex).getMember_id();
            default:
                return null;
        }
    }
    
}
