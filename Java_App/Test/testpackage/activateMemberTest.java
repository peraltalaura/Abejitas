package testpackage;


import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import junit.framework.Assert;
import model.*;
import model.mainclass.Member;
import org.junit.Test;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author peralta.laura
 */
public class activateMemberTest {
   Management m=new Management();
   Member m1;
   ArrayList<Object> array = new ArrayList<>();

    public activateMemberTest() {
        takeMembers();
    }
    public void takeMembers(){
    array = m.readData(array, "member");
        for (Object x : array) {
           m1=(Member) x;
           break;
        }
}
    @Test
    public void testActivate() {
        boolean expectedResult = true;
        boolean result=m.activateMember(m1.getMember_id());
        Assert.assertEquals(expectedResult, result);
    }
     @Test
    public void testDisable() {
        boolean expectedResult = true;
        boolean result=m.activateMember(m1.getMember_id());
        Assert.assertEquals(expectedResult, result);
    }
    @Test
    public void insertMember() throws ParseException{
        Date data=new SimpleDateFormat("dd/mm/yyyy").parse("01/05/1996");
        Member m1=new Member("Laura","Peralta","peralta_laura@hotmail.es","123",data,20870,"Elgoibar","Bernardo Ezenarro 5 2 izq",622655102);
        boolean expectedResult=true;
        boolean result=m.insertMember(m1);
         Assert.assertEquals(expectedResult, result);
    }
}
