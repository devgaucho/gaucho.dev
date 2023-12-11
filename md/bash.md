## rodando comandos em paralelo

```
parallel --gnu << 'EOF'
date >> out1 && sleep 5
date >> out2 && sleep 5
EOF
```
