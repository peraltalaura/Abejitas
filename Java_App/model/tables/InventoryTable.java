package model.tables;

import model.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.mainclass.Inventory;
//this class is the model for the inventory frame
public class InventoryTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Inventory> materials = new ArrayList<>();//stores data for the table
    private String[] titles = {"ITEM ID", "MODEL", "COMMENT"};//sets table col titles

    public InventoryTable() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "inventory");
        for (Object x : array) {
            materials.add((Inventory) x);
        }
    }

    public void addToInventory(Inventory i) {
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
