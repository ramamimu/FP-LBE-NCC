from bs4 import BeautifulSoup
from mysql.connector.errors import DatabaseError
import requests
import mysql.connector

html_text = requests.get('https://www.gensh.in/characters')
soup = BeautifulSoup(html_text.text, "html.parser")

def desc_link(numb):
    global soup
    desc_link=soup.select('div[class*="character-card col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-4 card-outer mb-4"]')
    index = len(desc_link)
    i = 0
    while (i<index):
        try:
            desc_link[i]="https:/www.gensh.in"+desc_link[i].a['href']
        except:
            print("Error desc")
            desc_link[i]=""

        if desc_link[i].find("/characters/") == -1:
            desc_link[i]=""
        i+=1
    if(numb==1):
        return desc_link
    else:
        return index

def images_ch():
    global soup
    images_ch=soup.select('div[class="card-body character-image"]')
    index_ch = len(images_ch)
    i = 0
    while (i<index_ch):
        try:
            images_ch[i]="https:/www.gensh.in"+images_ch[i].img['src']
        except:
            print("Error images")
            images_ch[i]=""
        i+=1
    return images_ch

def name_ch():
    global soup
    name_ch = soup.select('div[class="nameblock"]')
    index_name = len(name_ch)
    i=0
    while (i<index_name):
        name_ch[i]=name_ch[i].h2.text
        i+=1
    return name_ch

description = desc_link(1)
index = desc_link(2)
images = images_ch()
names = name_ch()

mydb = mysql.connector.connect(
    host = "localhost",
    username = "root",
    password = "",
    database = "wibu-chan"
)

my_cursor = mydb.cursor()

i = 0
while(i<index):
    temp = []
    temp.append(names[i])
    temp.append(images[i])
    temp.append(description[i])
    my_cursor.execute("INSERT INTO `character_genshin` (`name`, `image`, `description`) VALUES (%s, %s, %s)", (temp))
    i+=1


mydb.commit()