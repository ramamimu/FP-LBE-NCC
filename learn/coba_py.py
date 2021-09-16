from bs4 import BeautifulSoup

with open("//home//ramamimu//code//web_scrape//learn//index.html", 'r') as html_file:
    content = html_file.read()
    # print(content)
    soup = BeautifulSoup(content, 'lxml')
    # print(soup.prettify())
    tags=soup.find('p')
    print(tags)