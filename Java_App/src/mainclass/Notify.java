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
public class Notify {
    private int member_id;
    private int notification_id;
    private LocalDateTime notification_date;
    private boolean seen;
/**
 * constructor
 * @param member_id
 * @param notification_id
 * @param notification_date
 * @param seen 
 */
    public Notify(int member_id, int notification_id, LocalDateTime notification_date, boolean seen) {
        this.member_id = member_id;
        this.notification_id = notification_id;
        this.notification_date = notification_date;
        this.seen = seen;
    }
//getters & setters
    public int getMember_id() {
        return member_id;
    }

    public void setMember_id(int member_id) {
        this.member_id = member_id;
    }

    public int getNotification_id() {
        return notification_id;
    }

    public void setNotification_id(int notification_id) {
        this.notification_id = notification_id;
    }

    public LocalDateTime getNotification_date() {
        return notification_date;
    }

    public void setNotification_date(LocalDateTime notification_date) {
        this.notification_date = notification_date;
    }

    public boolean isSeen() {
        return seen;
    }

    public void setSeen(boolean seen) {
        this.seen = seen;
    }
    
}
