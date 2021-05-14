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
public class Comment {
    private int comment_id;
    private LocalDateTime date;
    private String message;
    private int member_id;

    public Comment(int comment_id, LocalDateTime date, String message, int member_id) {
        this.comment_id = comment_id;
        this.date = date;
        this.message = message;
        this.member_id = member_id;
    }
    public Comment (LocalDateTime date, String message, int member_id){
        this.date = date;
        this.message = message;
        this.member_id = member_id;
    }

    public int getComment_id() {
        return comment_id;
    }

    public void setComment_id(int comment_id) {
        this.comment_id = comment_id;
    }

    public LocalDateTime getDate() {
        return date;
    }

    public void setDate(LocalDateTime date) {
        this.date = date;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public int getMember_id() {
        return member_id;
    }

    public void setMember_id(int member_id) {
        this.member_id = member_id;
    }
    
}
