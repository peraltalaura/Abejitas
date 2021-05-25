/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.mainclass;

import java.util.Date;
import java.lang.*;

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
    private boolean active = false;
    private Date birthday;
    
    /**
     * constructor
     * @param member_id
     * @param name
     * @param surname
     * @param email
     * @param password
     * @param bithday
     * @param postCode
     * @param city
     * @param address
     * @param phone
     * @param active 
     */
    public Member(int member_id, String name, String surname, String email, String password, Date bithday,int postCode, String city, String address, int phone, boolean active) {
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
       
        this.birthday = birthday;
    }
    public Member(String name, String surname, String email, String password, Date birthday,int postCode, String city, String address, int phone) {
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.password = password;
        this.postCode = postCode;
        this.city = city;
        this.address = address;
        this.phone = phone;
       
        this.birthday = birthday;
    }
    public Member(String name, String surname, String email){
        this.name = name;
        this.surname = surname;
        this.email = email;
        int pass = (int)(Math.random() * 1000);
        this.password = "123" + "" + pass;
        
    }
//getters & setters
    public Date getBirthday() {
        return birthday;
    }

    public void setBirthday(Date birthday) {
        this.birthday = birthday;
    }

    public void setActive(boolean active) {
        this.active = active;
    }

    public boolean isActive() {
        return active;
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


}
