/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mainclass;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Inventory {
    private int item_id;
    private String model;
    private String comment;

    public Inventory(int item_id, String model, String comment) {
        this.item_id = item_id;
        this.model = model;
        this.comment = comment;
    }
    public Inventory(String model, String comment){
        this.model = model;
        this.comment = comment;
    }

    public int getItem_id() {
        return item_id;
    }

    public void setItem_id(int item_id) {
        this.item_id = item_id;
    }

    public String getModel() {
        return model;
    }

    public void setModel(String model) {
        this.model = model;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }
    
}

