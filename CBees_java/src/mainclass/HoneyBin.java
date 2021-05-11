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
public class HoneyBin {
    private int production_id;
    private int booking_id;
    private float kilos;
    private float total;
    private int metalbin_id;

    public HoneyBin(int production_id, int booking_id, int kilos, int total, int metalbin_id) {
        this.production_id = production_id;
        this.booking_id = booking_id;
        this.kilos = kilos;
        this.total = total;
        this.metalbin_id = metalbin_id;
    }

    public int getProduction_id() {
        return production_id;
    }

    public void setProduction_id(int production_id) {
        this.production_id = production_id;
    }

    public int getBooking_id() {
        return booking_id;
    }

    public void setBooking_id(int booking_id) {
        this.booking_id = booking_id;
    }

    public float getKilos() {
        return kilos;
    }

    public void setKilos(int kilos) {
        this.kilos = kilos;
    }

    public float getTotal() {
        return total;
    }

    public void setTotal(int total) {
        this.total = total;
    }

    public int getMetalbin_id() {
        return metalbin_id;
    }

    public void setMetalbin_id(int metalbin_id) {
        this.metalbin_id = metalbin_id;
    }
    
}
