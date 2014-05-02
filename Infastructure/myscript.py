#!/usr/bin/python
# My first python program
import urllib2
response = urllib2.urlopen('http://classes.iastate.edu/soc.jsp?term=F2014&dept=S+E++&term2=F2014&dept2=S+E++&course=&shour=06&sminute=00&sampm=am&ehour=11&eminute=55&eampm=pm&credit=+&instructor=&title=&edreq=&spclcourse=&partterm=2006-01-012006-12-31&smonth=01&sday=01&emonth=12&eday=31')
html = response.read()

text_file = open("../Infastructure/Output.txt", "w")
text_file.write(html);
text_file.close()

print "Hello, World!\n"