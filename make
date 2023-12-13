clear
echo "1/3) convertendo arquivos .md para .html"
for f in md/*.md
do
	apenasONome=$(basename "$f" | cut -d. -f1)
	pandoc -f markdown_strict "$f" -t html -o "html/$apenasONome.html"
done

echo

echo "2/3) commitando alterações"
git add -A
git commit -m "atualização do blog"
git push origin main

echo

echo "3/3) dando deploy"
ssh ubuntu@s1 'cd www/gaucho.dev && git pull origin main'

echo "feito!"