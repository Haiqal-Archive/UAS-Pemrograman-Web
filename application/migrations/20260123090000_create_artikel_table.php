<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_artikel_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'judul' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'konten' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'tanggal_dibuat' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('artikel');

        // Seed data: Rust Docs Style
        $data = array(
            array(
                'judul' => 'Getting Started with Rust',
                'slug' => 'getting-started-with-rust',
                'konten' => "Rust is a systems programming language that runs blazingly fast, prevents segfaults, and guarantees thread safety.\n\n## Installation\n\nTo install Rust, run the following in your terminal:\n\n```bash\ncurl --proto '=https' --tlsv1.2 -sSf https://sh.rustup.rs | sh\n```\n\n## Hello, World!\n\nThe classic entry point to any programming language.\n\n```rust\nfn main() {\n    println!(\"Hello, world!\");\n}\n```",
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ),
            array(
                'judul' => 'Variables and Mutability',
                'slug' => 'variables-and-mutability',
                'konten' => "By default, variables in Rust are immutable. This is one of many nudges Rust gives you to write your code in a way that takes advantage of the safety and easy concurrency that Rust offers.\n\n```rust\nfn main() {\n    let x = 5;\n    println!(\"The value of x is: {x}\");\n    // x = 6; // This would cause a compile error\n}\n```\n\nTo make a variable mutable, add `mut`:\n\n```rust\nfn main() {\n    let mut x = 5;\n    println!(\"The value of x is: {x}\");\n    x = 6;\n    println!(\"The value of x is: {x}\");\n}\n```",
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ),
            array(
                'judul' => 'Data Types',
                'slug' => 'data-types',
                'konten' => "Every value in Rust is of a certain data type, which tells Rust what kind of data is being specified so it knows how to work with that data.\n\n### Scalar Types\n\nA scalar type represents a single value. Rust has four primary scalar types: integers, floating-point numbers, Booleans, and characters.\n\n```rust\nfn main() {\n    let guess: u32 = \"42\".parse().expect(\"Not a number!\");\n    let x = 2.0; // f64\n    let y: f32 = 3.0; // f32\n}\n```",
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            )
        );
        $this->db->insert_batch('artikel', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('artikel', TRUE);
    }
}
