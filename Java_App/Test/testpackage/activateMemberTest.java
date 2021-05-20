package testpackage;


import java.util.ArrayList;
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
    /* 
    @Test
    public void insertMember(){

        Member expectedResult=new Member("Laura","Peralta","peralta_laura@hotmail.es","123",20870,"Elgoibar","Bernardo Ezenarro 5 2 izq",622655102,1,);
    }*/
   
}
