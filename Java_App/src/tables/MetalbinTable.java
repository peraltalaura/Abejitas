/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tables;

import controllers.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Metalbin;

//this class is the model for the metalbin frame
public class MetalbinTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Metalbin> production = new ArrayList<>();//stores data for the table
    private String[] titles = {"ID","NAME","AVAILABLE","AVAILABLE DATE"};//sets table col titles

    public MetalbinTable() {
        ArrayList<Object> array = new ArrayList<>();
        /*
           crea un arraylist de tipo objeto. y nosotros al tener un arraylist de tipo production no podemos agregarlos asecas 
           como java no deja castear arraylist, ya que el arraylist que devuelve el metodo tienen objetos de tipo objet y no production
            asi que recorriendo el arraylist y casteando cada objeto creariamos nuestro arraylist de tipo production
         */

        array = man.readData(array, "metalbin");
        for (Object x : array) {
            production.add((Metalbin) x);
        }

    }

    @Override
    public int getRowCount() {
        return production.size();
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
                return production.get(rowIndex).getMetalbin_id();
            case 1:
                return production.get(rowIndex).getName();
            case 2:
                return production.get(rowIndex).isAvailable();
            case 3:
                return production.get(rowIndex).getAvailable_date();
            default:
                return null;
        }
    }
    
}
