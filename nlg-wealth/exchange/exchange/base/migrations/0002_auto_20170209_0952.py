# -*- coding: utf-8 -*-
# Generated by Django 1.10.5 on 2017-02-09 09:52
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('base', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='contact',
            name='address',
            field=models.TextField(blank=True, null=True, verbose_name='Direcci\xf3n'),
        ),
        migrations.AlterField(
            model_name='contact',
            name='alias',
            field=models.CharField(blank=True, max_length=32, null=True, verbose_name='Alias'),
        ),
        migrations.AlterField(
            model_name='contact',
            name='borndate',
            field=models.DateField(blank=True, null=True, verbose_name='Cumplea\xf1os'),
        ),
        migrations.AlterField(
            model_name='contact',
            name='last_name',
            field=models.CharField(blank=True, max_length=128, null=True, verbose_name='Apellidos'),
        ),
        migrations.AlterField(
            model_name='contact',
            name='organization',
            field=models.CharField(blank=True, max_length=64, null=True, verbose_name='Organizaci\xf3n'),
        ),
    ]