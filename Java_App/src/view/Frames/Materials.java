/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view.Frames;

import java.awt.Color;
import model.tables.InventoryTable;

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
public class Materials extends javax.swing.JFrame {

    Timer updateTimer;
    int DELAY = 100;

    /**
     * Creates new form ninventory
     */
    public Materials() {
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
        this.jTextFieldComment.setOpaque(false);
        this.jTextFieldComment.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(255, 255, 255), 1, true));
        this.jTextFieldModel.setOpaque(false);
        this.jTextFieldModel.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(255, 255, 255), 1, true));
         this.jTableInventory.setBackground(new Color(0, 0, 0));
        ((DefaultTableCellRenderer) this.jTableInventory.getDefaultRenderer(Object.class)).setBackground(new Color(0, 0, 0, 0));
        this.jTableInventory.setGridColor(new Color(0,0,0,0));
        this.jTableInventory.setForeground(Color.WHITE);
        this.jScrollPane1.setBackground(new Color(0, 0, 0, 0));
        this.jScrollPane1.setOpaque(false);
        this.jTableInventory.setOpaque(true);
        ((DefaultTableCellRenderer) this.jTableInventory.getDefaultRenderer(Object.class)).setOpaque(false);
        this.jScrollPane1.getViewport().setOpaque(false);

    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTableInventory = new javax.swing.JTable();
        jLabel2 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jTextFieldModel = new javax.swing.JTextField();
        jTextFieldComment = new javax.swing.JTextField();
        jButtonAddItem = new view.frameComponents.ButtonInsert();
        button1 = new view.frameComponents.Button();
        jButtonDeleteItem = new view.frameComponents.ButtonDelete();
        jLabel3 = new javax.swing.JLabel();
        jLabelTime = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setUndecorated(true);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setFont(new java.awt.Font("Segoe Script", 1, 36)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 255, 255));
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("INVENTORY");
        getContentPane().add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 30, 480, 55));

        jTableInventory.setModel(new InventoryTable());
        jScrollPane1.setViewportView(jTableInventory);

        getContentPane().add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(42, 115, -1, 260));

        jLabel2.setFont(new java.awt.Font("Segoe Script", 0, 11)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(255, 255, 255));
        jLabel2.setText("ADD ITEM:");
        getContentPane().add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(670, 110, 70, 20));

        jLabel4.setForeground(new java.awt.Color(255, 255, 255));
        jLabel4.setText("MODEL:");
        getContentPane().add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(560, 150, 60, -1));

        jLabel5.setForeground(new java.awt.Color(255, 255, 255));
        jLabel5.setText("COMMENT:");
        getContentPane().add(jLabel5, new org.netbeans.lib.awtextra.AbsoluteConstraints(550, 200, 80, -1));

        jTextFieldModel.setForeground(new java.awt.Color(255, 255, 255));
        getContentPane().add(jTextFieldModel, new org.netbeans.lib.awtextra.AbsoluteConstraints(630, 150, 140, -1));

        jTextFieldComment.setForeground(new java.awt.Color(255, 255, 255));
        getContentPane().add(jTextFieldComment, new org.netbeans.lib.awtextra.AbsoluteConstraints(630, 200, 140, 70));

        jButtonAddItem.setBorder(null);
        jButtonAddItem.setForeground(new java.awt.Color(255, 255, 255));
        jButtonAddItem.setText("ADD ITEM");
        jButtonAddItem.setGradientLineColor(new java.awt.Color(51, 204, 0));
        jButtonAddItem.setLinePainted(true);
        jButtonAddItem.setRounded(true);
        getContentPane().add(jButtonAddItem, new org.netbeans.lib.awtextra.AbsoluteConstraints(670, 290, 80, 26));

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
        getContentPane().add(button1, new org.netbeans.lib.awtextra.AbsoluteConstraints(670, 380, 90, 50));

        jButtonDeleteItem.setBorder(null);
        jButtonDeleteItem.setForeground(new java.awt.Color(255, 255, 255));
        jButtonDeleteItem.setText("DELETE ITEM");
        jButtonDeleteItem.setGradientLineColor(new java.awt.Color(255, 0, 0));
        jButtonDeleteItem.setLinePainted(true);
        jButtonDeleteItem.setRounded(true);
        getContentPane().add(jButtonDeleteItem, new org.netbeans.lib.awtextra.AbsoluteConstraints(560, 290, 92, 27));

        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        getContentPane().add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(70, 40, 120, 30));

        jLabelTime.setIcon(new javax.swing.ImageIcon(getClass().getResource("/panal3_.jpg"))); // NOI18N
        getContentPane().add(jLabelTime, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 800, 480));

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
//            java.util.logging.Logger.getLogger(Inventory.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (InstantiationException ex) {
//            java.util.logging.Logger.getLogger(Inventory.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (IllegalAccessException ex) {
//            java.util.logging.Logger.getLogger(Inventory.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
//            java.util.logging.Logger.getLogger(Inventory.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        }
//        //</editor-fold>
//        //</editor-fold>
//
//        /* Create and display the form */
//        java.awt.EventQueue.invokeLater(new Runnable() {
//            public void run() {
//                new Inventory().setVisible(true);
//            }
//        });
//    }
    public static Materials createMaterials() {
        Materials v = new Materials();

        return v;
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private view.frameComponents.Button button1;
    public view.frameComponents.ButtonInsert jButtonAddItem;
    public view.frameComponents.ButtonDelete jButtonDeleteItem;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabelTime;
    private javax.swing.JScrollPane jScrollPane1;
    public javax.swing.JTable jTableInventory;
    public javax.swing.JTextField jTextFieldComment;
    public javax.swing.JTextField jTextFieldModel;
    // End of variables declaration//GEN-END:variables
}
