package tables;

import controller.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import mainclass.Comment;


public class CommentsTable extends AbstractTableModel {
    
    private Management man= new Management();
    public ArrayList<Comment> comments = new ArrayList<>();
    private String[] titles;
    public CommentsTable(){
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "booking");
        for(Object x : array){
            comments.add((Comment)x);
        }
    }
    @Override
    public int getRowCount() {
        return comments.size();
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
                return comments.get(rowIndex).getComment_id();
            case 1:
                return comments.get(rowIndex).getDate();
            case 2:
                return comments.get(rowIndex).getMessage();
            case 3:
                return comments.get(rowIndex).getMember_id();
            default:
                return null;
        }
    }
    
}
