/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view.Frames;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.swing.Timer;
import javax.swing.table.DefaultTableCellRenderer;

/**
 *
 * @author uribe.markel
 */
public class Availability extends javax.swing.JFrame {
     Timer updateTimer;
    int DELAY = 100;
    /**
     * Creates new form navailability
     */
    public Availability() {
        initComponents();
        updateTimer = new Timer(DELAY, new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                Date currentTime = new Date();
                String formatTimeStr = "hh:mm:ss";
                DateFormat formatTime = new SimpleDateFormat(formatTimeStr);
                String formattedTimeStr = formatTime.format(currentTime);

                jLabelTime.setText(formattedTimeStr);

                setTitle("Time: " + formattedTimeStr);

            }
        });
        updateTimer.start();
        this.jTableMetal.setBackground(new Color(0, 0, 0, 0));
        ((DefaultTableCellRenderer) this.jTableMetal.getDefaultRenderer(Object.class)).setBackground(new Color(0, 0, 0, 0));
        this.jTableMetal.setGridColor(Color.WHITE);
        this.jTableMetal.setForeground(Color.WHITE);
        this.jScrollPane1.setBackground(new Color(0, 0, 0, 0));
        this.jScrollPane1.setOpaque(false);
        this.jTableMetal.setOpaque(false);
        ((DefaultTableCellRenderer) this.jTableMetal.getDefaultRenderer(Object.class)).setOpaque(false);
        this.jScrollPane1.getViewport().setOpaque(false);

        this.jTableBookings.setBackground(new Color(0, 0, 0, 0));
        ((DefaultTableCellRenderer) this.jTableBookings.getDefaultRenderer(Object.class)).setBackground(new Color(0, 0, 0, 0));
        this.jTableBookings.setGridColor(Color.WHITE);
        this.jTableBookings.setForeground(Color.WHITE);
        this.jScrollPane2.setBackground(new Color(0, 0, 0, 0));
        this.jScrollPane2.setOpaque(false);
        this.jTableBookings.setOpaque(false);
        ((DefaultTableCellRenderer) this.jTableBookings.getDefaultRenderer(Object.class)).setOpaque(false);
        this.jScrollPane2.getViewport().setOpaque(false);
        
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel2 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTableBookings = new javax.swing.JTable();
        jScrollPane2 = new javax.swing.JScrollPane();
        jTableMetal = new javax.swing.JTable();
        jLabel3 = new javax.swing.JLabel();
        button1 = new view.frameComponents.Button();
        jLabel4 = new javax.swing.JLabel();
        jLabelTime = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        setUndecorated(true);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel2.setFont(new java.awt.Font("Segoe Script", 0, 11)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(255, 255, 255));
        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("EXTRACTOR BOOKINGS DATES:");
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(105, 72, 240, 34));

        jLabel1.setFont(new java.awt.Font("Segoe Script", 1, 36)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("AVAILABILITY");
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(290, 10, 400, 55));

        jTableBookings.setForeground(new java.awt.Color(255, 255, 255));
        jTableBookings.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        jScrollPane1.setViewportView(jTableBookings);

        getContentPane().add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(30, 139, 380, 406));

        jTableMetal.setForeground(new java.awt.Color(255, 255, 255));
        jTableMetal.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null},
                {null, null, null, null}
            },
            new String [] {
                "Title 1", "Title 2", "Title 3", "Title 4"
            }
        ));
        jScrollPane2.setViewportView(jTableMetal);

        getContentPane().add(jScrollPane2, new org.netbeans.lib.awtextra.AbsoluteConstraints(512, 139, 390, 406));

        jLabel3.setFont(new java.awt.Font("Segoe Script", 0, 11)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("METALBINS AVAILABILITY");
        getContentPane().add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(628, 80, 175, -1));

        button1.setBorder(null);
        button1.setForeground(new java.awt.Color(255, 255, 255));
        button1.setText("HOME");
        button1.setGradientLineColor(new java.awt.Color(0, 204, 204));
        button1.setLineColor(new java.awt.Color(255, 255, 0));
        button1.setLinePainted(true);
        button1.setRounded(true);
        button1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                button1ActionPerformed(evt);
            }
        });
        getContentPane().add(button1, new org.netbeans.lib.awtextra.AbsoluteConstraints(410, 570, 100, 50));

        jLabel4.setForeground(new java.awt.Color(255, 255, 255));
        jLabel4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/panal3_.jpg"))); // NOI18N
        getContentPane().add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(-6, 2, 980, 630));

        jLabelTime.setText("jLabel5");
        getContentPane().add(jLabelTime, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 30, 140, 30));

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void button1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_button1ActionPerformed
        // TODO add your handling code here:
        this.dispose();
    }//GEN-LAST:event_button1ActionPerformed

    /**
     * @param args the command line arguments
     */
//    public static void main(String args[]) {
//        /* Set the Nimbus look and feel */
//        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
//        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
//         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
//         */
//        try {
//            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
//                if ("Nimbus".equals(info.getName())) {
//                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
//                    break;
//                }
//            }
//        } catch (ClassNotFoundException ex) {
//            java.util.logging.Logger.getLogger(Availability.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (InstantiationException ex) {
//            java.util.logging.Logger.getLogger(Availability.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (IllegalAccessException ex) {
//            java.util.logging.Logger.getLogger(Availability.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
//            java.util.logging.Logger.getLogger(Availability.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        }
//        //</editor-fold>
//        //</editor-fold>
//
//        /* Create and display the form */
//        java.awt.EventQueue.invokeLater(new Runnable() {
//            public void run() {
//                new Availability().setVisible(true);
//            }
//        });
//}
    public static Availability createAvailability() {
        Availability v = new Availability();
        return v;
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private view.frameComponents.Button button1;
    private javax.swing.JLabel jLabel1;
    javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabelTime;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    public javax.swing.JTable jTableBookings;
    public javax.swing.JTable jTableMetal;
    // End of variables declaration//GEN-END:variables
}
