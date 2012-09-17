<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:include href="Form/InputText.xsl"/>
  <xsl:include href="Form/Password.xsl"/>
  <xsl:include href="Form/TextArea.xsl"/>
  <xsl:include href="Form/Select.xsl"/>
  <xsl:include href="Form/Button.xsl"/>

  <xsl:template match="/Form">
    <form class="form-horizontal">
      <input type="hidden" name="token">
        <xsl:attribute name="value">
          <xsl:value-of select="token"/>
        </xsl:attribute>
      </input>
      <xsl:for-each select="elements/elements">
        <div class="control-group">
          <xsl:if test="error = '1'">
            <xsl:attribute name="class">
              <xsl:text>control-group error</xsl:text>
            </xsl:attribute>
          </xsl:if>

          <xsl:variable name="value">
            <xsl:value-of select="value"/>
          </xsl:variable>
          <xsl:variable name="label">
            <xsl:value-of select="label"/>
          </xsl:variable>
          <xsl:variable name="name">
            <xsl:value-of select="name"/>
          </xsl:variable>
          <xsl:variable name="placeholder">
            <xsl:value-of select="placeholder"/>
          </xsl:variable>
          <xsl:variable name="class">
            <xsl:value-of select="class"/>
          </xsl:variable>
          <xsl:variable name="selected">
            <xsl:value-of select="selected"/>
          </xsl:variable>

          <xsl:choose>

            <xsl:when test="type = 'InputText'">
              <xsl:call-template name="InputText">
                <xsl:with-param name="value" select="$value"/>
                <xsl:with-param name="label" select="$label"/>
                <xsl:with-param name="name" select="$name"/>
                <xsl:with-param name="class" select="$class"/>
                <xsl:with-param name="placeholder" select="$placeholder"/>
              </xsl:call-template>
            </xsl:when>

            <xsl:when test="type = 'Password'">
              <xsl:call-template name="Password">
                <xsl:with-param name="value" select="$value"/>
                <xsl:with-param name="label" select="$label"/>
                <xsl:with-param name="name" select="$name"/>
                <xsl:with-param name="class" select="$class"/>
                <xsl:with-param name="placeholder" select="$placeholder"/>
              </xsl:call-template>
            </xsl:when>

            <xsl:when test="type = 'Button'">
              <xsl:call-template name="Button">
                <xsl:with-param name="value" select="$value"/>
                <xsl:with-param name="label" select="$label"/>
                <xsl:with-param name="name" select="$name"/>
                <xsl:with-param name="class" select="$class"/>
                <xsl:with-param name="placeholder" select="$placeholder"/>
              </xsl:call-template>
            </xsl:when>

            <xsl:when test="type = 'TextArea'">
              <xsl:call-template name="TextArea">
                <xsl:with-param name="value" select="$value"/>
                <xsl:with-param name="label" select="$label"/>
                <xsl:with-param name="name" select="$name"/>
                <xsl:with-param name="class" select="$class"/>
                <xsl:with-param name="placeholder" select="$placeholder"/>
              </xsl:call-template>
            </xsl:when>

            <xsl:when test="type = 'Select'">
              <xsl:call-template name="Select">
                <xsl:with-param name="value" select="$value"/>
                <xsl:with-param name="label" select="$label"/>
                <xsl:with-param name="name" select="$name"/>
                <xsl:with-param name="class" select="$class"/>
                <xsl:with-param name="placeholder" select="$placeholder"/>
                <xsl:with-param name="selected" select="$selected"/>
              </xsl:call-template>
            </xsl:when>

          </xsl:choose>
        </div>
      </xsl:for-each>

    </form>
  </xsl:template>

</xsl:stylesheet>
