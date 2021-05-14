/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mainclass;

import java.time.LocalDateTime;

/**
 *
 * @author kalboetxeaga.ager
 */
public class Payment {
    private int payment_id;
    private String description;
    private LocalDateTime date;
    private float total;
    private int member_id;

    public Payment(int payment_id, String description, LocalDateTime date, float total, int number_id) {
        this.payment_id = payment_id;
        this.description = description;
        this.date = date;
        this.total = total;
        this.member_id = number_id;
    }
    public Payment( String description, LocalDateTime date, float total, int number_id) {
        this.description = description;
        this.date = date;
        this.total = total;
        this.member_id = number_id;
    }

    public int getPayment_id() {
        return payment_id;
    }

    public void setPayment_id(int payment_id) {
        this.payment_id = payment_id;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public LocalDateTime getDate() {
        return date;
    }

    public void setDate(LocalDateTime date) {
        this.date = date;
    }

    public float getTotal() {
        return total;
    }

    public void setTotal(float total) {
        this.total = total;
    }

    public int getMember_id() {
        return member_id;
    }

    public void setNumber_id(int number_id) {
        this.member_id = number_id;
    }
    
    
}
