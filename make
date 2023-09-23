clear
echo "convertendo arquivos .md para .html"
for f in md/*.md
do
	apenasONome=$(basename "$f" | cut -d. -f1)
	pandoc -f markdown "$f" -t html -o "html/$apenasONome.html"
done
echo "feito!"