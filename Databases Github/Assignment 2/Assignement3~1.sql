/*
Thomas Killen C16394453 DT228 2
I started by inserting the correct data into the appropriate classes, based off of the
briefe and the generated erwin. I had to make sure that I was inserting the data correcctly as each
corisponding piece of data had to go into the data value correctly.
*/
/*
The first table is the values that correspond to the client off of the briefe.
This was designed to the specefecations of the generated erwin and the briefe.
*/
INSERT INTO CLIENT VALUES (101, 'j.j.Abrams', 'jjab@sw.com');
INSERT INTO CLIENT VALUES (201, 'Lawrence Kasdan', 'lkas@sw.com');
INSERT INTO CLIENT VALUES (301, 'Daisey Ridley', 'drid@sw.com');
INSERT INTO CLIENT VALUES (401, 'John Boyega', 'jboy@sw.com');
/*
The second table is the values that correspond to the designer off of the briefe.
This was designed to the specefecations of the generated erwin and the briefe.
*/
INSERT INTO DESIGNER VALUES (101, 'Kelly Hoppen', 'khop@gmail.com.uk', 65.00);
INSERT INTO DESIGNER VALUES (201, 'Philippe Stark', 'pstark@stark.com', 72.50);
INSERT INTO DESIGNER VALUES (301, 'Victoria Hagan', 'vichag@gmail.com', 75.00);
INSERT INTO DESIGNER VALUES (401, 'Marmol Radziner', 'marmrad@gmail.com', 45.50);
/*
The third table is the values that correspond to the specefecations off of the briefe.
This was designed to the specefecations of the generated erwin and the briefe.
*/
INSERT INTO SPECIFICATION VALUES (101, 'Full House', 10000, 101, 101, 10, '12 Jun 2017');
INSERT INTO SPECIFICATION VALUES (102, 'Garden Patio', 12000, 101, 101, 20, '14 Jul 2017');
INSERT INTO SPECIFICATION VALUES (103, 'Summer House', 8000, 201, 301, 5, '15 Aug 2017');
INSERT INTO SPECIFICATION VALUES (104, 'Christmas Decorations', 5000, 301, 201, 5, '10 Oct 2017');
/*
The fourth table is the values that correspond to the product off of the briefe.
This was designed to the specefecations of the generated erwin and the briefe.
*/
INSERT INTO PRODUCT VALUES (101, 'Outdoor Wall Light', 40.00, 26, 'Garden Lighting');
INSERT INTO PRODUCT VALUES (102, 'Patio Lights', 41.00, 27, 'Garden Lighting');
INSERT INTO PRODUCT VALUES (101, 'E14 Energy Saving Bulb', 6.00, 28, 'Lamps and Bulbs');
INSERT INTO PRODUCT VALUES (102, 'E27 Led Bulb', 9.00, 30, 'Lamps and Bulbs');
INSERT INTO PRODUCT VALUES (101, '2-Core Black Braided Flexible Rubber Cable', 10.00, 50, 'Cables');
INSERT INTO PRODUCT VALUES (102, 'Southwire 250-Ft 2-Conductor Landscape Lighting', 11.00, 78, 'Cables');
INSERT INTO PRODUCT VALUES (101, 'LED string lights German Christmas 10-light', 15.50, 55, 'Christmas');
INSERT INTO PRODUCT VALUES (102, 'LED heart string lights', 20.00, 12, 'Christmas');
INSERT INTO PRODUCT VALUES (101, 'Fabric Cylinder Shade Red', 30.00, 100, 'Shades');
/*
The fifth table is the values that correspond to the product specifications off of the briefe.
This was designed to the specefecations of the generated erwin and the briefe.
*/
INSERT INTO SPECPROD VALUES (101, 'L101', 20);
INSERT INTO SPECPROD VALUES (101, 'L112', 30);
INSERT INTO SPECPROD VALUES (101, 'C101', 10);
INSERT INTO SPECPROD VALUES (102, 'G101', 20);
INSERT INTO SPECPROD VALUES (102, 'G102', 25);
INSERT INTO SPECPROD VALUES (103, 'C101', 10);
INSERT INTO SPECPROD VALUES (103, 'C102', 3);
INSERT INTO SPECPROD VALUES (104, 'X101', 20);
/*
With all the insertions I had to make sure that what I was adding was correct and that the values werent
clashing with the tables values, for eg: inserting a word into something that expects a numeric value.
I also made sure to avoid getting mixed up between the values that were expected from the generated erwin 
and what was on the brife as some werent in order so to avoid confusion I printed out the briefe
and highlighted parts to be careful of.
*/

/*
The statements beleow are designed specifically off of the briefe. They are designed to
the specefecations given and work off of the values that were inserted to the tables.
*/

/*
The first statement gets the designerID, Full name, email address and specefication detail 
from both the designer and specefication tables. I also made sure specefecation detail was upper and
was sorted in decending from designerID
*/
SELECT designerID, fullName, emailAdr, UPPER(specDesc),
FROM Designer, Specification,
ORDER BY designerID DESC;

/*
The second statement takes information from both the product and specefecation tables but this time
there is concationation between the values of prodID and prodCat. There is also the inclusion of 
the euro symbol by using to_char and u99,999.00.
*/
SELECT CONCAT(CONCAT(prodId, ' '),prodCat) "Product", UPPER(specDesc), UPPER(prodDescription), TO_CHAR(prodUnitPrice, 'U99,999.00'),
FROM Product, Specification,
ORDER BY prodDesc ASC, prodPrice DESC;
/*
The third statement takes information from both the client and specefecation tables. There is the edition 
of getting dates using to_char FMDD MM YYYY so it potrays the date correctly.
*/
SELECT specID, clientID, fullName, specDesc, TO_CHAR(specDate, 'FMDD MM YYYY'), TO_CHAR(specCommission, 'U99,999.00'),
FROM Specification, Client,
ORDER BY specCommission DESC;
/*
The fourth statement takes information from both the client and specefecation and designer tables. This time with
the addition of the use of headers by getting the data from the tables but using the 'as' function with 
the name of the header in qoutation marks. This will show the headers for the tables being printed.
*/
SELECT specID as "SPECIFICATION ID", clientID, fullName as "CLIENT NAME", designerID, fullName as "DESIGNER NAME", specDescription as "DESCRIPTION", TO_CHAR(specDate, 'FMDD MM YYYY') as "COMMISSION DATE", TO_CHAR(specCommission, 'U99,999.00') as "COMMISSION AMT",
FROM Specification, Client, Designer
ORDER BY specCommission DESC;
/*
The fifth statement takes information from both the product and specefecation tables. This time multiplication was involved
with the demand price multiplied by quantity. I found that the best way to do this was the use of a case statement.
This allowed me to access the data needed and combine them and use a simple multiplication function within it.
*/
SELECT specID, specDescription, prodDescription, TO_CHAR(prodUnitPrice, 'U99,999.00'), prodQtyInStock,
    CASE prodUnitPrice, prodQtyInStock
            prodUnitPrice*prodQtyInStock
    END "Total price per product per specification "
FROM Specification, Product;
/*
The sixth statement takes information from both the product and specefecation tables. This time the addition involved required
a group function as needed to get commission + Sum of price x product price for all products used.
*/
SELECT specID, specDescription, "Total cost of the specification"TO_CHAR(round(specCommission+SUM(prodUnitPrice)*prodUnitPrice),'U99,999.00'), 
FROM Specification, Product
group by specID;
/*
The sevent statement takes information from both the product and specefecation tables. For this statement it was similar to the
statement beforehand but required a case statement as an additional column was needed to output which categorises the specification as ‘High Value’ 
if the total cost is > 10,000, ‘Medium Cost’ if the total cost is between 8,000 and 10,000 and ‘Low Cost’.
*/
SELECT specID, specDescription, "Total cost of the specification"TO_CHAR(round(specCommission+SUM(prodUnitPrice)*prodUnitPrice),'U99,999.00'), 
CASE round
    WHEN >10000 THEN "High Value"
    WHEN BETWEEN 8000 AND 10000 THEN "Medium Cost"
    WHEN <8000 THEN "Low Cost"
END "Values"
FROM Specification, Product
group by specID;
/*
The last statement takes information from both the product and specefecation tables. Again like the last statement this is based off
of statement six. This was done by using case statements, concationation and grouping. A sentence was formed using
the concationation and the case was to check if was greater than 10000 and if was to print high value specefication.
This was grouped by specID. 
*/
SELECT 'Specification '||specID ||, ' '||specDescription, ' used a total of '||prodUnitQty, ' at a cost of '||TO_CHAR(prodUnitPrice, 'U99,999.00'), ' and the total cost including commission was '||TO_CHAR(round(specCommission+SUM(prodUnitPrice)*prodUnitPrice), 'U99,999.00'), 
CASE round
    WHEN >10000 THEN "High Value Specification"
END "Value"
FROM Specification, Product
group by specID;