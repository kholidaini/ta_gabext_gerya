tahapan saat ingin develope :

> cloning project
- git clone https://github.com/kholidaini/ta_gabext_greyima.git geyma
- git clone https://github.com/kholidaini/ta_gabext_greyima.git gede

> inisial
git config --user.name "username github geyma"
git config --user.name "username github gede"
------------------
git config --user.email emailgeyma
git config --user.email emailgede


>membuat branch
git branch be_geyma
bit branch fe_gede

>mengaktifkan branch
git checkout be_geyma
git checkout fe_gede

>lakukan coding/edit project, setelah dikira selesai edit/coding, lalu
>git add .

>git commit -m "be_geyma:tambah file.html"
>git commit -m "fe_gede:tambah file.html"

>git push -u origin be_geyma
>git push -u origin fe_gede


- jika ingin mengupdate keseluruhan project
jika user master :
>git pull origin be_geyma
>git pull origin fe_gede

jika user be_geyma:
>git pull origin master
>git pull origin fe_gede

jika user fe_geyma:
>git pull origin master
>git pull origin be_geyma
