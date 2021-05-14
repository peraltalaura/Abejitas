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
public class Member {

    private int member_id;
    private String name;
    private String surname;
    private String email;
    private String password;
    private int postCode;
    private String city;
    private String address;
    private int phone;
    private String notifications;
    private boolean active;

    public Member(int member_id, String name, String surname, String email, String password, int postCode, String city, String address, int phone, boolean active) {
        this.member_id = member_id;
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.password = password;
        this.postCode = postCode;
        this.city = city;
        this.address = address;
        this.phone = phone;
        this.active = active;

    }

    public boolean isActive() {
        return active;
    }

    public Member(String name, String surname, String email, String password, int postCode, String city, String address, int phone, boolean active) {
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.password = password;
        this.postCode = postCode;
        this.city = city;
        this.address = address;
        this.phone = phone;
        this.active = active;

    }

    public int getMember_id() {
        return member_id;
    }

    public void setMember_id(int member_id) {
        this.member_id = member_id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getPostCode() {
        return postCode;
    }

    public void setPostCode(int postCode) {
        this.postCode = postCode;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public int getPhone() {
        return phone;
    }

    public void setPhone(int phone) {
        this.phone = phone;
    }

    public String getNotifications() {
        return notifications;
    }

    public void setNotifications(String notifications) {
        this.notifications = notifications;
    }

}
