Documentation of commandline 

# NOTE

This is not functional as of now. Only documented right now, so that in future, we can write code to fulfil it.

# Asya-prayatna

Syntax:

php panini.php -a <letter_in_slp1>

Usage:

php panini.php -a d

Explanation:

This would give the details of Asya and prayatna of letter 'd' i.e. 'द्‌'.

# pratyahara

Syntax:

php panini.php -p pratyAhAra_in_slp1 it_display

it_display can be 'y' or 'n'. 'y' would display the इत्‌ markers. 'n' would not show it.

Usage:

php panini.php -p hl y

Explanation:

This would give the pratyAhAra 'hal' e.g. 'हल्‌' with इत्‌ markers.

# sandhi

Syntax:

php panini.php -j first_word second_word pada_flag

pada_flag has 1 for pada+pada and 2 for prAtipadika+pratyaya sandhi.

Usage:

php panini.php -j rAma jas 2

Explanation:

This would give rAma+jas with prAtipadika+pratyaya joining.

# savarna

Syntax:

php panini.php -e letter pratyAhAra

Usage:

php panini.php -e p jS

Explanation:

This would give the savarNa of letter 'p' in pratyAhAra 'jS' i.e. letter 'b'.

# subanta

Syntax:

php panini.php -s gender word [pratyaya] [sutra_to_be_ignored]

gender = 'm'/'f'/'n' for masculine, feminine and neuter gender respectively.

Usage:

1. php panini.php -s m Davala jas

2. php panini.php -s m Davala jas 1.3.9

Explanation:

1. This would give derivation of Davala+jas subanta word.

2. This would give derivation of Davala+jas subanta word with the presumption that sUtra 1.3.9 doesn't exist in Panini's grammar. (Useful to understand the improtance of a given sUtra)

# tiGanta

Syntax:

php panini.php -t verb_or_verbnumber [lakAra] [tiN_pratyaya] [sutra_to_be_ignored]

lakAra = law, liw, luw, lfw, sArvaDAtukalew, ArDaDAtukalew, low, laN, viDiliN, ASIrliN, luN, lfN

Usage:

1. php panini.php -t BU law sip == php panini -t 01.0001 law sip

2. php panini.php -t BU law sip 1.3.9

Explanation:

1. This would give derivation of BU+sip for law lakAra.

2. This would give derivation of BU+sip for law lakAra wit the presumtion that sUtra 1.3.9 doesn't exist in Panini's grammar.  (Useful to understand the improtance of a given sUtra)


# Testing purpose

Right now we keep separate shell scripts to do batch testing against given database in case of tiGanta generation. Same can be rolled out to subanta also. Pending as of now.

Suggested syntax:

php panini.php -st gender word [pratyaya] [sutra_to_be_ignored]

php panini.php -tt verb_or_verbnumber [lakAra] [tiN_pratyaya] [sutra_to_be_ignored]
