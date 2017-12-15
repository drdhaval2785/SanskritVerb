echo "Extracting the recent verb data."
php extract1.php
echo "Copmaring recent verb data with legacy data of Mihail Bayaryn."
echo "These are the suspect forms."
python issue983.py
echo "See Data/issue983/suspect.txt file for suspect entries"
