package model.tables;

import model.Management;
import java.util.ArrayList;
import java.util.HashSet;
import javax.swing.table.AbstractTableModel;
import model.mainclass.Inventory;
//this class is the model for the inventory frame
public class InventoryTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Inventory> materials = new ArrayList<>();//stores data for the table
    private String[] titles = {"ID", "MODEL", "COMMENT"};//sets table col titles

    public InventoryTable() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "inventory");
        for (Object x : array) {
            materials.add((Inventory) x);
        }
    }
    
    /**
     * Adds the inserted object into the arraylist
     * @param i the inserted object 
     */
    public void addToInventory(Inventory i) {
        i.setItem_id(materials.get(materials.size()-1).getItem_id()+1);//esto en todos
        
        materials.add(i);
        this.fireTableDataChanged();
    }

    public void removeFromInventory(int iId) {
        for (Inventory i : materials) {
            if (i.getItem_id() == iId) {
                materials.remove(i);
                break;
            }
        }
        this.fireTableDataChanged();
    }

    public ArrayList<Inventory> getMaterials() {
        return materials;
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
    public String getColumnName(int column) {
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
