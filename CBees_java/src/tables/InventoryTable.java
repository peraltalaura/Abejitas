package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Inventory;

public class InventoryTable extends AbstractTableModel {
   
    private Management man= new Management();
    public ArrayList<Inventory> materials = new ArrayList<>();
    private String[] titles;
    public InventoryTable(){
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "inventory");
        for(Object x : array){
            materials.add((Inventory)x);
        }
    }
    @Override
    public int getRowCount() {
        return materials.size();
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
                return materials.get(rowIndex).getItem_id();
            case 1:
                return materials.get(rowIndex).getModel();
            case 2:
                return materials.get(rowIndex).getComment();
            
            default:
                return null;
        }
    }
    
}
