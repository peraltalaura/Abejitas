/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mainclass;

import java.util.Date;




public class Metalbin {
    private int metalbin_id;
    private String name;
    private boolean available;
    private Date available_date;
    /**
     * constructor
     * @param metalbin_id
     * @param name
     * @param available
     * @param available_date 
     */
    public Metalbin(int metalbin_id, String name, boolean available, Date available_date) {
        this.metalbin_id = metalbin_id;
        this.name = name;
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

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public boolean isAvailable() {
        return available;
    }

    public void setAvailable(boolean available) {
        this.available = available;
    }
    
}
