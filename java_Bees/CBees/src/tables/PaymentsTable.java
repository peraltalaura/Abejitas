package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Payment;


public class PaymentsTable extends AbstractTableModel {

    private Management man= new Management();
   // public ArrayList<Payment> payments_list = new ArrayList<>();
    public ArrayList<Payment> payments_list = new ArrayList<>();
    private String[] titles;
    
    public PaymentsTable(){
        ArrayList<Object> array = new ArrayList<>();
        
        array = man.readData(array, "payment");
        for(Object x: array){
        payments_list.add((Payment)x);
    }
    }
    @Override
    public int getRowCount() {
        return payments_list.size();
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
                return payments_list.get(rowIndex).getPayment_id();
            case 1:
                return payments_list.get(rowIndex).getDescription();
            case 2:
                return payments_list.get(rowIndex).getDate();
            case 3:
                return payments_list.get(rowIndex).getTotal();
            case 4:
                return payments_list.get(rowIndex).getNumber_id();
            
            default:
                return null;
        }
    }
    
}
