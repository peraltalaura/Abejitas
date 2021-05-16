/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controllers;

import view.Availability;
import view.Comments;
import view.Home;
import view.Materials;
import view.MemberNotifications;
import view.Members;
import view.Payments;

/**
 *
 * @author peralta.laura
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Home home = Home.createView();
        Comments com = Comments.createComments();
        Materials mat = Materials.createMaterials();
        Availability av = Availability.createAvailability();
        Members mem = Members.createMembers();
        Payments pay = Payments.createPayments();
        Management man = new Management();
        MemberNotifications nf = MemberNotifications.createNotifications();
        HomeController controller = new HomeController(home, mem, pay, av, mat, com, man, nf);
    }

}
