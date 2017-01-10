#! /usr/bin/env python
import sys
import io
import requests
cid=sys.argv[1]
link='http://www.worlddutyfree.com/information/index.php?option=com_dutyfree&task=&country_id='+str(cid)
response = requests.get(link)
import bs4
soup = bs4.BeautifulSoup(response.text)
data = soup.select('p.columbus')
head=soup.select('h2')
acthead=head[1:]
j=0
for i in data:
	print acthead[j]
	print i
	j+=1
