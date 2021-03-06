/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.mainclass;

import java.time.LocalDateTime;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Production {

    private int production_id;
    private float kilos;
    private float total;
    private int booking_id;
    private int metalbin_id;
    private LocalDateTime production_date;
    /**
     * constructor
     * @param production_id
     * @param kilos
     * @param total
     * @param booking_id
     * @param metalbin_id
     * @param production_date 
     */
    public Production(int production_id, float kilos, float total, int booking_id, int metalbin_id, LocalDateTime production_date) {
        this.production_id = production_id;
        this.booking_id = booking_id;
        this.metalbin_id = metalbin_id;
        this.kilos = kilos;
        this.total = total;
        this.production_date = production_date;

    }
//getters & setters

    public LocalDateTime getProduction_date() {
        return production_date;
    }

    public void setProduction_date(LocalDateTime production_date) {
        this.production_date = production_date;
    }

    public void setProduction_id(int production_id) {
        this.production_id = production_id;
    }

    public void setKilos(float kilos) {
        this.kilos = kilos;
    }

    public void setTotal(float total) {
        this.total = total;
    }

    public int getProduction_id() {
        return production_id;
    }

    public int getBooking_id() {
        return booking_id;
    }

    public void setBooking_id(int booking_id) {
        this.booking_id = booking_id;
    }

    public int getMetalbin_id() {
        return metalbin_id;
    }

    public void setMetalbin_id(int metalbin_id) {
        this.metalbin_id = metalbin_id;
    }

    public float getKilos() {
        return kilos;
    }

    public float getTotal() {
        return total;
    }

}
