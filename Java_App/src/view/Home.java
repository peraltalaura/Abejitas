/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view;

/**
 *
 * @author uribe.markel
 */
public class Home extends javax.swing.JFrame {

    /**
     * Creates new form nhome
     */
    public Home() {
        initComponents();
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
        INVENTORY = new javax.swing.JButton();
        PAYMENTS = new javax.swing.JButton();
        AVAILABILITY = new javax.swing.JButton();
        COMMENTS = new javax.swing.JButton();
        MEMBERS = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        members = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jLabel1.setFont(new java.awt.Font("Tahoma", 1, 36)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 204, 0));
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("ERLETE");
        jLabel1.setToolTipText("");

        INVENTORY.setBackground(new java.awt.Color(0, 0, 0));
        INVENTORY.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        INVENTORY.setForeground(new java.awt.Color(255, 153, 0));
        INVENTORY.setText("MANAGE INVENTORY");

        PAYMENTS.setBackground(new java.awt.Color(0, 0, 0));
        PAYMENTS.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        PAYMENTS.setForeground(new java.awt.Color(255, 153, 0));
        PAYMENTS.setText("MANAGE PAYMENTS");

        AVAILABILITY.setBackground(new java.awt.Color(0, 0, 0));
        AVAILABILITY.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        AVAILABILITY.setForeground(new java.awt.Color(255, 153, 0));
        AVAILABILITY.setText("MANAGE AVAILABILITY");

        COMMENTS.setBackground(new java.awt.Color(0, 0, 0));
        COMMENTS.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        COMMENTS.setForeground(new java.awt.Color(255, 153, 0));
        COMMENTS.setText("MANAGE COMMENTS");

        MEMBERS.setBackground(new java.awt.Color(0, 0, 0));
        MEMBERS.setFont(new java.awt.Font("Tahoma", 1, 14)); // NOI18N
        MEMBERS.setForeground(new java.awt.Color(255, 153, 0));
        MEMBERS.setText("MANAGE MEMBERS");

        jLabel3.setText("MEMBERS:");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLabel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(INVENTORY)
                        .addGap(18, 18, 18)
                        .addComponent(PAYMENTS)
                        .addGap(18, 18, 18)
                        .addComponent(AVAILABILITY)
                        .addGap(18, 18, 18)
                        .addComponent(COMMENTS)
                        .addGap(18, 18, 18)
                        .addComponent(MEMBERS)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 77, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(31, 31, 31)
                        .addComponent(members, javax.swing.GroupLayout.PREFERRED_SIZE, 86, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(740, 740, 740))))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 55, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(members, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 112, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(PAYMENTS)
                    .addComponent(AVAILABILITY)
                    .addComponent(COMMENTS)
                    .addComponent(MEMBERS)
                    .addComponent(INVENTORY))
                .addGap(45, 45, 45))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

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
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (InstantiationException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (IllegalAccessException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
//            java.util.logging.Logger.getLogger(Home.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
//        }
//        //</editor-fold>
//        //</editor-fold>
//
//        /* Create and display the form */
//        java.awt.EventQueue.invokeLater(new Runnable() {
//            public void run() {
//                new Home().setVisible(true);
//            }
//        });
//    }
         public static Home viewaSortuBistaratu() {
        Home v = new Home();
        java.awt.EventQueue.invokeLater(() -> {
            v.setVisible(true);
        });
        return v;
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    public javax.swing.JButton AVAILABILITY;
    public javax.swing.JButton COMMENTS;
    public javax.swing.JButton INVENTORY;
    public javax.swing.JButton MEMBERS;
    public javax.swing.JButton PAYMENTS;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel3;
    public javax.swing.JLabel members;
    // End of variables declaration//GEN-END:variables
}