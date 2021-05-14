package tables;

import controllers.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Production;

public class ProductionsTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Production> production = new ArrayList<>();
    private String[] titles = {"PRODUCTION ID", "TOTAL KG", "BOOKING ID", "METALBIN ID", "PRODUCTION DATE"};

    public ProductionsTable() {
        ArrayList<Object> array = new ArrayList<>();
        /*
           crea un arraylist de tipo objeto. y nosotros al tener un arraylist de tipo production no podemos agregarlos asecas 
           como java no deja castear arraylist, ya que el arraylist que devuelve el metodo tienen objetos de tipo objet y no production
            asi que recorriendo el arraylist y casteando cada objeto creariamos nuestro arraylist de tipo production
         */

        array = man.readData(array, "production");
        for (Object x : array) {
            production.add((Production) x);
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
                return production.get(rowIndex).getProduction_id();

            case 1:
                return production.get(rowIndex).getKilos();
            case 2:
                return production.get(rowIndex).getTotal();
            case 3:
                return production.get(rowIndex).getBooking_id();
            case 4:
                return production.get(rowIndex).getMetalbin_id();
            case 5:
                return production.get(rowIndex).getProduction_date();
            default:
                return null;
        }
    }

}
