/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mainclass;


public class Notification {
    private int notification_id;
    private String message;
    /**
     * constructor
     * @param notification_id
     * @param message 
     */
    public Notification(int notification_id, String message) {
        this.notification_id = notification_id;
        this.message = message;
    }
//getters & setters
    public int getNotification_id() {
        return notification_id;
    }

    public void setNotification_id(int notification_id) {
        this.notification_id = notification_id;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
    
    
}
