#!/bin/bash

#rm prog_compiled_from_php               # Remove previously compiled program
GCC=`which gcc`                         # Find the path to gcc and store it in the "GCC" variable
gcc /home/vagrant/Code/Programitas/a_plus_b.c -o prog_compiled_from_php # Compile prog.c into the binary called prog_compiled_from_php
#./prog_compiled_from_php                # Execute the compiled program