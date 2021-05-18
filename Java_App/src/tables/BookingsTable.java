package tables;

import controllers.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Booking;

//this class is the model for the booking frame
public class BookingsTable extends AbstractTableModel {

    private Management man= new Management();
    public ArrayList<Booking> occupied_list = new ArrayList<>();//stores data for the table
    private String[] titles={"ENTRY-DATE","EXIT-DATE"};//sets table col titles
    
    public BookingsTable(){
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
                return occupied_list.get(rowIndex).getEntryDate();
            case 1:
                return occupied_list.get(rowIndex).getExitDate();
            default:
                return null;
        }
    }
    
}
