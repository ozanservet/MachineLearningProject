#!c:/Python35/python.exe

import pymysql
import pymysql.cursors
import sys
import json
'''
import urllib.error
from urllib.request import urlopen
import urllib3
import requests
'''
nicknameinput = sys.argv[1]

def SubtractionFromBigger ( avg, orj):
    if avg>orj:
        return avg-orj
    else:
        return orj-avg

# Connect to the database
connection = pymysql.connect(host='localhost',
                             user='root',
                             password='123456',
                             db='inputdatabase')

def insertionSort(alist):
    for index in range(1,len(alist)):
        currentvalue = alist[index]
        position = index
        while position>0 and alist[position-1]>currentvalue:
            alist[position]=alist[position-1]
            position = position-1

        alist[position]=currentvalue

try:
    with connection.cursor() as cursor:
        # Read a single record
        IE_prediction = 0
        CS_prediction = 0
        EE_prediction = 0
        ME_prediction = 0
        MAT_prediction = 0
        BIO_prediction = 0
        ECON_prediction = 0
        VA_prediction = 0
        CULT_prediction = 0
        PSY_prediction = 0
        POLS_prediction = 0
        IR_prediction = 0
        MGMT_prediction = 0
        sql = "SELECT `subject` , `course` FROM `enrolledtable` WHERE `nickname`=%s"
        cursor.execute(sql, (nicknameinput))
        result = cursor.fetchall()
        for row in result:
            #print (row)
            sqlnickname = "SELECT `nickname` FROM `enrolledtable` `studenttable` WHERE `subject`=%s and `course`=%s"
            cursor.execute(sqlnickname, (row))
            studentsWhoTakeThisSpecialCourse = cursor.fetchall()
            #print (studentsWhoTakeThisSpecialCourse)
            IE_students = []
            CS_students = []
            EE_students = []
            ME_students = []
            MAT_students = []
            BIO_students = []
            ECON_students = []
            VA_students = []
            CULT_students = []
            PSY_students = []
            POLS_students = []
            IR_students = []
            MGMT_students = []
            IEaveragegrades = 0.0
            CSaveragegrades = 0.0
            EEaveragegrades = 0.0
            MEaveragegrades = 0.0
            MATaveragegrades = 0.0
            BIOaveragegrades = 0.0
            ECONaveragegrades = 0.0
            VAaveragegrades = 0.0
            CULTaveragegrades = 0.0
            PSYaveragegrades = 0.0
            POLSaveragegrades = 0.0
            IRaveragegrades = 0.0
            MGMTaveragegrades = 0.0
            sqlfeedback = "SELECT `feedback` FROM `studenttable` WHERE `nickname`=%s"
            for categoriesWithFeedback in studentsWhoTakeThisSpecialCourse:
                cursor.execute(sqlfeedback, (categoriesWithFeedback))
                studentsfeedback = cursor.fetchone()
                if studentsfeedback != (None,):
                    sqlgrade = "SELECT `grade` FROM `enrolledtable` WHERE `subject`=%s and `course`=%s and `nickname`=%s"

                    #print (categoriesWithFeedback, studentsfeedback)
                    if studentsfeedback == ('IE',):
                        IE_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultIE = cursor.fetchone()
                        IEaveragegrades += resultIE[0]
                    elif studentsfeedback == ('CS',):
                        CS_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultCS = cursor.fetchone()
                        CSaveragegrades += resultCS[0]
                    elif studentsfeedback == ('EE',):
                        EE_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultEE = cursor.fetchone()
                        EEOaveragegrades += resultEEo[0]
                    elif studentsfeedback == ('ME',):
                        ME_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultME = cursor.fetchone()
                        MEaveragegrades += resultME[0]
                    elif studentsfeedback == ('MAT',):
                        MAT_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultMAT = cursor.fetchone()
                        MATaveragegrades += resultMATo[0]
                    elif studentsfeedback == ('BIO',):
                        BIO_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultBio = cursor.fetchone()
                        BIOaveragegrades += resultBio[0]
                    elif studentsfeedback == ('ECON',):
                        ECON_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultECON = cursor.fetchone()
                        ECONaveragegrades += resultECON[0]
                    elif studentsfeedback == ('VA',):
                        VA_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultVA = cursor.fetchone()
                        VAaveragegrades += resultVA[0]
                    elif studentsfeedback == ('CULT',):
                        CULT_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultCULT = cursor.fetchone()
                        CULTaveragegrades += resultCULT[0]
                    elif studentsfeedback == ('PSY',):
                        PSY_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultPSY = cursor.fetchone()
                        PSYaveragegrades += resultPSY[0]
                    elif studentsfeedback == ('POLS',):
                        POLS_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultPOLS = cursor.fetchone()
                        POLSaveragegrades += resultPOLS[0]
                    elif studentsfeedback == ('IR',):
                        IR_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultIR = cursor.fetchone()
                        IRaveragegrades += resultIR[0]
                    elif studentsfeedback == ('MGMT',):
                        MGMT_students.append(categoriesWithFeedback)
                        cursor.execute(sqlgrade, (row[0], row[1], categoriesWithFeedback))
                        resultMGMT = cursor.fetchone()
                        MGMTaveragegrades += resultMGMT[0]

                    if(len(IE_students) != 0):
                        IEaveragegrades /= len(IE_students)
                    if(len(CS_students) != 0):
                        CSaveragegrades /= len(CS_students)
                    if(len(EE_students) != 0):
                        EEaveragegrades /= len(EE_students)
                    if(len(ME_students) != 0):
                        MEaveragegrades /= len(ME_students)
                    if(len(MAT_students) != 0):
                        MATaveragegrades /= len(MAT_students)
                    if(len(BIO_students) != 0):
                        BIOaveragegrades /= len(BIO_students)
                    if(len(ECON_students) != 0):
                        ECONaveragegrades /= len(ECON_students)
                    if(len(VA_students) != 0):
                        VAaveragegrades /= len(VA_students)
                    if(len(CULT_students) != 0):
                        CULTaveragegrades /= len(CULT_students)
                    if(len(PSY_students) != 0):
                        PSYaveragegrades /= len(PSY_students)
                    if(len(POLS_students) != 0):
                        POLSaveragegrades /= len(POLS_students)
                    if(len(IR_students) != 0):
                        IRaveragegrades /= len(IR_students)
                    if(len(MGMT_students) != 0):
                        MGMTaveragegrades /= len(MGMT_students)

                    #print ()"BIOaveragegrades of ", row ," fined successfully",BIOaveragegrades)

                    sql = "SELECT `grade` FROM `enrolledtable` WHERE `subject`=%s and `course`=%s and `nickname`=%s"
                    cursor.execute(sqlgrade, (row[0], row[1], nicknameinput))
                    resultInput = cursor.fetchone()
                    orj = resultInput[0]

                    #Possibility of non exist fields will zero with below operations
                    IE_closeness = 5
                    CS_closeness = 5
                    EE_closeness = 5
                    ME_closeness = 5
                    MAT_closeness = 5
                    BIO_closeness = 5
                    ECON_closeness = 5
                    VA_closeness = 5
                    CULT_closeness = 5
                    POLS_closeness = 5
                    PSY_closeness = 5
                    IR_closeness = 5
                    MGMT_closeness =5
                    if(len(IE_students) != 0):
                        IE_closeness = SubtractionFromBigger ( IEaveragegrades, orj)
                    if(len(CS_students) != 0):
                        CS_closeness = SubtractionFromBigger ( CSaveragegrades, orj)
                    if(len(EE_students) != 0):
                        EE_closeness = SubtractionFromBigger ( EEaveragegrades, orj)
                    if(len(ME_students) != 0):
                        ME_closeness = SubtractionFromBigger ( MEaveragegrades, orj)
                    if(len(MAT_students) != 0):
                        MAT_closeness = SubtractionFromBigger ( MATaveragegrades, orj)
                    if(len(BIO_students) != 0):
                        BIO_closeness = SubtractionFromBigger ( BIOaveragegrades, orj)
                    if(len(ECON_students) != 0):
                        ECON_closeness = SubtractionFromBigger ( ECONaveragegrades, orj)
                    if(len(VA_students) != 0):
                        VA_closeness = SubtractionFromBigger ( VAaveragegrades, orj)
                    if(len(CULT_students) != 0):
                        CULT_closeness = SubtractionFromBigger ( CULTaveragegrades, orj)
                    if(len(POLS_students) != 0):
                        POLS_closeness = SubtractionFromBigger ( POLSaveragegrades, orj)
                    if(len(PSY_students) != 0):
                        PSY_closeness = SubtractionFromBigger ( PSYaveragegrades, orj)
                    if(len(IR_students) != 0):
                        IR_closeness = SubtractionFromBigger ( IRaveragegrades, orj)
                    if(len(MGMT_students) != 0):
                        MGMT_closeness = SubtractionFromBigger ( MGMTaveragegrades, orj)

                    alist = [IE_closeness,CS_closeness,EE_closeness,ME_closeness,MAT_closeness,BIO_closeness,ECON_closeness,VA_closeness,CULT_closeness,POLS_closeness,PSY_closeness,IR_closeness,MGMT_closeness]
                    insertionSort(alist)
                    #print (alist)

                    #en az fark olani bulma
                    if alist[0] == IE_closeness:
                       IE_prediction += 1
                    if alist[0] == CS_closeness:
                        CS_prediction += 1
                    if alist[0] == EE_closeness:
                       EE_prediction += 1
                    if alist[0] == ME_closeness:
                        ME_prediction += 1
                    if alist[0] == MAT_closeness:
                       MAT_prediction += 1
                    if alist[0] == BIO_closeness:
                        BIO_prediction += 1
                    if alist[0] == ECON_closeness:
                       ECON_prediction += 1
                    if alist[0] == VA_closeness:
                        VA_prediction += 1
                    if alist[0] == CULT_closeness:
                       CULT_prediction += 1
                    if alist[0] == PSY_closeness:
                        PSY_prediction += 1
                    if alist[0] == POLS_closeness:
                       POLS_prediction += 1
                    if alist[0] == IR_closeness:
                        IR_prediction += 1
                    if alist[0] == MGMT_closeness:
                       MGMT_prediction += 1

                    items = [IE_prediction,CS_prediction,EE_prediction,ME_prediction,MAT_prediction,BIO_prediction,ECON_prediction,VA_prediction,CULT_prediction,POLS_prediction,PSY_prediction,IR_prediction,MGMT_prediction]
                    insertionSort(items)

        if items[-1] == IE_prediction:
            print ("Your field is predicted: Industrial Engineering")
        if items[-1] == CS_prediction:
            print ("Your field is predicted: Computer Science & Engineering")
        if items[-1] == EE_closeness:
            print ("Your field is predicted: Electronics Engineering")
        if items[-1] == ME_prediction:
            print ("Your field is predicted: Mechatronics Engineering")
        if items[-1] == MAT_prediction:
            print ("Your field is predicted: Materials Science and Nanoengineering")
        if items[-1] == BIO_prediction:
            print ("Your field is predicted: Molecular Biology, Genetics, and Bioengineering")
        if items[-1] == ECON_prediction:
            print ("Your field is predicted: Economics")
        if items[-1] == VA_prediction:
            print ("Your field is predicted: Visual Arts & Communication Design")
        if items[-1] == CULT_prediction:
            print ("Your field is predicted: Cultural Studies")
        if items[-1] == PSY_prediction:
            print ("Your field is predicted: Psychology")
        if items[-1] == POLS_prediction:
            print ("Your field is predicted: Political Science")
        if items[-1] == IR_prediction:
            print ("Your field is predicted: International Studies")
        if items[-1] == MGMT_closeness:
            print ("Your field is predicted: Marketing")
finally:
    connection.close()
