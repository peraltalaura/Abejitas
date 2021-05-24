/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.mainclass;

import java.util.Date;




public class Metalbin {
    private int metalbin_id;
    private int capacity;
    private boolean available;
    private Date available_date;
    /**
     * constructor
     * @param metalbin_id
     * @param name
     * @param available
     * @param available_date 
     */
    public Metalbin(int metalbin_id, int capacity, boolean available, Date available_date) {
        this.metalbin_id = metalbin_id;
        this.capacity = capacity;
        this.available = available;
        this.available_date = available_date;
    }
//getters & setters
    public int getMetalbin_id() {
        return metalbin_id;
    }

    public Date getAvailable_date() {
        return available_date;
    }

    public void setAvailable_date(Date available_date) {
        this.available_date = available_date;
    }

    public void setMetalbin_id(int metalbin_id) {
        this.metalbin_id = metalbin_id;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public boolean isAvailable() {
        return available;
    }

    public void setAvailable(boolean available) {
        this.available = available;
    }
    
}
