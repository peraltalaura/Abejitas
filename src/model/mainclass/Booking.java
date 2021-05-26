/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.mainclass;


import java.util.Date;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Booking {
    private int booking_id;
    private Date entryDate;
    private Date exitDate;
    private int kilos;
    private int total;
    private int member_id;
    /**
     * constructor
     * @param booking_id
     * @param entryDate
     * @param exitDate
     * @param kilos
     * @param total
     * @param member_id 
     */
    public Booking(int booking_id, Date entryDate, Date exitDate,int kilos, int total, int member_id) {
        this.booking_id = booking_id;
        this.entryDate = entryDate;
        this.exitDate = exitDate;
        this.kilos = kilos;
        this.total = total;
        this.member_id = member_id;
        
    }
    //getters & setters
    public int getKilos() {
        return kilos;
    }

    public void setKilos(int kilos) {
        this.kilos = kilos;
    }

    public int getTotal() {
        return total;
    }

    public void setTotal(int total) {
        this.total = total;
    }

    public int getBooking_id() {
        return booking_id;
    }

    public void setBooking_id(int booking_id) {
        this.booking_id = booking_id;
    }

    public Date getEntryDate() {
        return entryDate;
    }

    public void setEntryDate(Date entryDate) {
        this.entryDate = entryDate;
    }

    public Date getExitDate() {
        return exitDate;
    }

    public void setExitDate(Date exitDate) {
        this.exitDate = exitDate;
    }

    public int getMember_id() {
        return member_id;
    }

    public void setMember_id(int member_id) {
        this.member_id = member_id;
    }
    
    
}
