package model.tables;

import model.Management;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;
import model.mainclass.Comment;
//this class is the model for the comments frame
public class CommentsTable extends AbstractTableModel {

    private Management man = new Management();
    public ArrayList<Comment> comments = new ArrayList<>();//stores data for the table
    private String[] TITLES = {"ID", "DATE", "MESSAGE", "MEMBER"};//sets table col titles

    public CommentsTable() {
        ArrayList<Object> array = new ArrayList<>();
        array = man.readData(array, "comment");
        for (Object x : array) {
            comments.add((Comment) x);
        }
    }

    public void deleteComment(int cID) {
        for (Comment c : comments) {
            if (c.getComment_id() == cID) {
                comments.remove(c);
                break;
            }
        }
        this.fireTableDataChanged();
    }

    public ArrayList<Comment> getComments() {
        return comments;
    }

    @Override
    public int getRowCount() {
        return comments.size();
    }

    @Override
    public int getColumnCount() {
        return TITLES.length;
    }

    @Override
    public String getColumnName(int column) {
        return TITLES[column];
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
