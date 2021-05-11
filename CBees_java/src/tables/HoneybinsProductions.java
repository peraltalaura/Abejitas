package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Booking;
import mainclass.HoneyBin;


public class HoneybinsProductions extends AbstractTableModel {

    private Management man= new Management();
    public ArrayList<Booking> honeybins = new ArrayList<>();
    private String[] titles;
    public HoneybinsProductions(){
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "booking");
        for(Object x : array){
            honeybins.add((Booking)x);
        }
    }
    @Override
    public int getRowCount() {
        return honeybins.size();
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
                return honeybins.get(rowIndex).getBooking_id();
            case 1:
                return honeybins.get(rowIndex).getEntryDate();
            case 2:
                return honeybins.get(rowIndex).getExitDate();
            case 3:
                return honeybins.get(rowIndex).getKilos();
            case 4:
                return honeybins.get(rowIndex).getTotal();
           
            
            default:
                return null;
        }
    }
    
}
